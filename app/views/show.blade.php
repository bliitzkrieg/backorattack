@extends('layouts.master')

@section('content')
	<h1>{{ $post->title }}</h1>
	<article>
		{{ $post->description }}
		<p> {{ link_to('/', 'Go Back')  }} </p>
	</article>
@stop