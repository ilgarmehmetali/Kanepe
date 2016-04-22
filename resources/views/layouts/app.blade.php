<html>
<head>
	<meta http-equiv="Content-Language" content="en" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	<link href="/css/app.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	<script src="/js/jquery-2.2.0.min.js"></script>
	<script src="/js/materialize.min.js"></script>
</head>
<body>

	<header>

		@if( isset($header->title) )
		<div class="parallax-container row" style="position:relative; height:100% ">
		@else
		<div class="parallax-container row" style="position:relative; height:40% ">
		@endif
			<div class="parallax" style="top:auto;">
				<img src="/img/bg.jpg">
			</div>

			<div class="col s12 right-align">
				@if( isset($header) )
					<h5>
						<a href="/" style="font-weight:900; text-shadow: 0px 0px 2px #000;">Home Page</a>
					</h5>
				@endif
				@if (Auth::check())
					<a href="/kanepe" style="font-weight:900; text-shadow: 0px 0px 2px #000;">Admin</a>
				@endif
			</div>

			@if( isset($header->title) )
			<div class="col s12 m8 offset-m2">
				<div style="position:absolute; bottom:100px; background-color:rgba(0,0,0,0.5); margin-top:100px; padding:10px !important" class="card-panel">
					@include('common.title')
				</div>
			</div>
			<div class="col s12 center-align" style="position:absolute; bottom:10px;">
				<a style="height:90px" href="#main">
						<i class="large material-icons blue-grey-text text-lighten-5">keyboard_arrow_down</i>
				</a>
			</div>
			@endif

		</div>

		<script>
		$(document).ready(function(){
			$('.parallax').parallax();
		});
		</script>

	</header>

	<main id="main">
		<div class="container">
			@yield('content')
		</div>
	</main>
	<footer>
		<div class="row">
			<div class="col s12 center-align text-center gray">
					<label>
						{{ env('COPYRIGHT', 'All rights reserved') }}
					</label>
			</div>
		</div>
	</footer>
</body>
</html>
