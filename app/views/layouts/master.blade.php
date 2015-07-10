<!doctype html>

@include('layouts.header')
@include('layouts.sidebar')
@include('layouts.footer')

<html>
	<head>
		<meta charset="utf-8">
		<script src="https://code.jquery.com/jquery.js"></script>
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css"/>
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="../fancybox/source/jquery.fancybox.css"/>
		<script src="../fancybox/source/jquery.fancybox.pack.js"></script>
		<link rel="stylesheet" href="../css/style.css"/>
		<meta name="viewport" content="width=device-width" />
		<title>back or attack</title>
	</head>
	<body>
		@if (Session::get('flash_message'))
			<div id="flash_message" class="alert alert-success" style="margin-bottom:0">
				{{ Session::get('flash_message') }}
				<script>
					window.setTimeout(function() {
					    $("#flash_message").fadeTo(500, 0).slideUp(500, function(){
					        $(this).remove(); 
					    });
					}, 5000);0
				</script>
			</div>
		@endif
  @yield('header')
	<div class="container" style="width: 100%;padding-left: 0px;">
        <div class="col-xs-12 col-md-2"> 
          @if (Auth::check())
          <div> @yield('logged') </div>
          @else
          <div> @yield('login') </div>
          @endif
          <div class="sbAd"> @yield('sbAd') </div>
        </div>
        <div class="col-xs-12 col-md-10"> 
        	@yield('content') 
        </div>
	</div>
	  	<div class="well" id="message"> <small>Please remember youtube channels rely on ad-revenue to keep them afloat so subscribe & remove adblock so they can keep creating content! </small></div>
	@yield('footer')
	</body>
</html>