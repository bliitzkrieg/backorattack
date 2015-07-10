@extends('layouts.master')

@section('content')
@if(Auth::check())
	<div class="row">
		<h3>Following:</h3>
        <div class="panel panel-default">
            <ul class="list-group">
				@foreach($posts as $post)
			   		@include('partials/followPost')
				@endforeach
            </ul>
            <div class="panel-footer" style="text-align:center">
            	<a id="paging" href="f?page=2">Next</a>
        	</div>
        </div>
    </div>
    <script>
			function qs(key) {
				key = key.replace(/[*+?^$.\[\]{}()|\\\/]/g, "\\$&"); // escape RegEx meta chars
				var match = location.search.match(new RegExp("[?&]"+key+"=([^&]+)(&|$)"));
				return match && decodeURIComponent(match[1].replace(/\+/g, " "));
			}
			var page = qs("page");
			if(page == null){
				page = 2;
			}
			else{
				page++;
			}
			$('#paging').attr('href','{{Auth::user()->username}}?page='+page);
    		$(".flag").click(function() { 
			    var isGood = confirm('Are you sure you want to report this post?');
			    if(isGood){
			    	//fire ajax
			    }
			});
 			$(".favorite").click(function() {
			  $(this).toggleClass('clicked');
			  $.ajax({
				    type: "GET",
				    url: '../follow',
				    data: { post:$(this).data("post") }
				}).done(function( msg ) {
				});
			});
			$("")
	</script>
@else
	<h4>You must be logged in to view this page.</h4>
@endif
@stop