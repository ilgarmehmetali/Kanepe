<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Compiled and minified CSS -->
	<link rel="stylesheet" href="/css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


	<!-- Compiled and minified JavaScript -->
	<script src="/js/jquery-2.2.0.min.js"></script>
	<script src="/js/materialize.min.js"></script>
	<style>
	header, main, footer {
		padding-left: 240px;
	}

	@media only screen and (max-width : 992px) {
		header, main, footer {
			padding-left: 0;
		}
	}
	</style>
</head>
<body>
	<div class="container">
		@yield('content')
	</div>
</body>
