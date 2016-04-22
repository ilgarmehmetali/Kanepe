<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="/css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="/css/admin.css" type="text/css" rel="stylesheet" media="screen,projection"/>

	<script src="/js/jquery-2.2.0.min.js"></script>
	<script src="/js/materialize.min.js"></script>

	<script src="/js/simplemde.min.js"></script>
	<link href="/css/simplemde.min.css" type="text/css" rel="stylesheet"/>

</head>
<body>
	<header>
		<nav class="top-nav">
			<div class="container">
				<a href="#" data-activates="nav-mobile" class="button-collapse top-nav full hide-on-large-only">
					<i class="mdi-navigation-menu"></i>
				</a>

				<ul class="right">
					<li>
						<a href="/">
							<i class="material-icons left">web</i> Home Page
						</a>

					</li>
				</ul>

			</div>
		</nav>
		<ul id="nav-mobile" class="side-nav fixed">

			<li class="center-align" style="height:90px;">
				<a href="/kanepe"><i class="large material-icons">dashboard</i></a>
			</li>
			<li class="bold"><a href="/kanepe/pages" class="waves-effect waves-teal">Pages</a></li>
			<li class="bold"><a href="/kanepe/posts" class="waves-effect waves-teal">Posts</a></li>
			<li class="bold"><a href="/kanepe/about" class="waves-effect waves-teal">About Me</a></li>
			<li class="bold"><a href="/kanepe/logout" class="waves-effect waves-teal">Logout</a></li>
		</ul>
	</header>

	<main>
		<div class="container">
			<!-- Page Layout here -->

			@yield('content')
		</div>
	</main>

	<script>
	$(".button-collapse").sideNav();
	</script>

</body>
</html>
