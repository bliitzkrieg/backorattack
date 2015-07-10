@extends('layouts.master')

@section('content')
@if(Auth::check())
     {{ Form::open(array('url' => 'settings/process', 'method' => 'POST')) }}
     	<h1>Settings</h1>
     	<br/>
     	<h3>Change Password</h3>
     	<hr/>
        <div class="form-group">
            {{ Form::label('lblPass', 'Password') }}
            {{ Form::text('pass', null, ['class' => 'form-control', 'placeholder' => 'Password', 'id' => 'pass']) }}
        </div>	
        <div class="form-group">
            {{ Form::label('lblRePass', 'Re-enter Password') }}
            {{ Form::text('rePass', null, ['class' => 'form-control', 'placeholder' => 'Re-enter your Password', 'id' => 'pass']) }}
            <?php echo $errors->first('rePass', '<span class=error>:message</span>'); ?>
        </div>
        <div>
           {{ Form::submit("Change", ['class' => 'btn btn-lg btn-success']) }}
        </div>
    {{ Form::close() }}   
    <br/>
    <h3>Delete Account</h3>
    <hr/>
    {{ Form::open(array('url' => 'settings/delete', 'method' => 'POST')) }}
    {{ HTML::image(Captcha::img(), 'Captcha image') }}
    <br/><br/>
    <div class="form-group">
            {{ Form::text('captcha', null, ['class' => 'form-control', 'placeholder' => 'Enter the Captcha', 'id' => 'captcha']) }}
            <?php echo $errors->first('captcha', '<span class=error>:message</span>'); ?>
    </div>
    {{ Form::submit("Delete", ['class' => 'btn btn-lg btn-danger delete' ]) }}

    {{ Form::close() }} 
@else
    <h4>You must be logged in to view this page.</h4>
@endif
@stop