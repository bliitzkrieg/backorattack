@extends('layouts.master')

@section('content')
<div class="container marginFix">


     {{ Form::open(array('url' => 'contact/process', 'method' => 'POST')) }}
                        <div class="form-group">
                            {{ Form::label('lblFirst', 'First Name:') }}
                            {{ Form::text('fname', null, ['class' => 'form-control', 'placeholder' => 'First Name', 'id' => 'fname']) }}
                            <?php echo $errors->first('fname', '<span class=error>:message</span>'); ?>
                        </div>

                        <div class="form-group">
                            {{ Form::label('lblLast', 'Last Name:') }}
                            {{ Form::text('lname', null, ['class' => 'form-control']) }}
                            <?php echo $errors->first('lname', '<span class=error>:message</span>'); ?>
                        </div>

                        <div class="form-group">
                          {{ Form::label('lblEmail', 'Email:') }}
                          {{ Form::text('email', null, ['class' => 'form-control']) }}
                          <?php echo $errors->first('email', '<span class=error>:message</span>'); ?>
                        </div>
                                @if($from == "contact")
                                    <?php $selected = 'C' ?>
                                @elseif($from == "support")
                                    <?php  $selected = 'S'; ?>  
                                @elseif($from == "request")
                                    <?php  $selected = 'R'; ?>
                                @elseif($from == "idea")
                                    <?php $selected = 'I'; ?>
                                @elseif($from == "hug")
                                    <?php  $selected = 'H'; ?>
                                @endif

                        <div class="form-group">
                          {{ Form::label('lblSubject', 'Subject:') }}
                          {{ Form::select('subject', array('C' => 'Contact','S' => 'Support','R' => 'Request','I' => 'Idea', 'H' => 'Hug'), $selected); }}
                        </div>

                        <div class="form-group">
                          {{ Form::label('lblMessage', 'Email:') }}
                          {{ Form::textarea('message', null, ['class' => 'form-control']) }}
                          <?php echo $errors->first('message', '<span class=error>:message</span>'); ?>
                        </div>

                        <center>{{ HTML::image(Captcha::img(), 'Captcha image') }}</center>
                        <br/>

                        <div class="form-group">
                            {{ Form::text('captcha', null, ['class' => 'form-control', 'placeholder' => 'Enter Captcha here']) }}
                            <?php echo $errors->first('captcha', '<span class=error>:message</span>'); ?>
                        </div>
                        <div>
                          {{ Form::submit("Send", ['class' => 'btn btn-lg btn-success btn-block']) }}
                        </div>
                      {{ Form::close() }}   

</div>
@stop