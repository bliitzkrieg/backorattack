@extends('layouts.master')

@section('content')
@if(Auth::check())
	<div class='create'>
		<h2>Submit Post</h2>
		<noscript>
		   <p>JavaScript required to post a video.</p>
		</noscript>
		<br/>
		@include('partials/createPost')
	</div>
@else
	<h4>You must be logged in to view this page.</h4>
@endif
@stop