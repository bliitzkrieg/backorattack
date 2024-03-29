@extends('layouts.master')

@section('login')

<div class="container">
    <div class="row">
		<div class="col-md-4 col-md-offset-4">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
			    	<h3 class="panel-title">Please login</h3>
			 	</div>
			  	<div class="panel-body">
			    	{{ Form::open(array('route' => 'sessions.store')) }}
                    <fieldset>
			    	  	<div class="form-group">
			    		    {{ Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Username']) }}
			    		</div>
			    		<div class="form-group">
			    			{{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) }}
			    		</div>
			    		<!--
			    		<div class="checkbox">
			    	    	<label>
			    	    		<input name="remember" type="checkbox" value="Remember Me"> Remember Me
			    	    	</label>
			    	    </div>
			    		-->
			    	    {{ Form::submit("Login", ['class' => 'btn btn-lg btn-success btn-block']) }}

			    	</fieldset>
			      	{{ Form::close() }}
			    </div>
			</div>
		</div>
	</div>
</div>

@stop