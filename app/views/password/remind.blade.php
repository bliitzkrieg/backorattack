@extends('layouts.master')

@section('content')
    
    <h1> Need to reset your password?</h1>
    {{ Form::open() }}
    <div class="form-group">
        {{ Form::label('lblEmail', 'Email Address:') }}
        {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email', 'id' => 'email']) }}
        @if (Session::has('error'))
            <span class=error>{{ Session::get('error') }}</span> 
        @endif
    </div>
    {{ Form::submit("Reset", ['class' => 'btn btn-lg btn-success' ]) }}

    {{ Form::close() }} 
@stop