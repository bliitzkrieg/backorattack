@extends('layouts.master')

@section('content')
    
    <h1> Reset your new password</h1>
    {{ Form::open() }}
    <input type="hidden" name="token" value="{{ $token }}">
    <div class="form-group">
        {{ Form::label('lblEmail', 'Email Address:') }}
        {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email', 'id' => 'email']) }}
    </div>
    <div class="form-group">
        {{ Form::label('lblPassword', 'Password:') }}
        {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) }}
    </div>
    <div class="form-group">
        {{ Form::label('lblRePass', 'Re-enter Password:') }}
        {{ Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Re-Enter Password']) }}
    </div>

    {{ Form::submit("Submit", ['class' => 'btn btn-lg btn-success' ]) }}

    @if (Session::has('error'))
        <span class=error>{{ Session::get('error') }}</span> 
    @endif

    {{ Form::close() }} 
@stop