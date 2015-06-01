<!doctype HTML>
	<html>
		<head>
			<title>Perpustakaan Online Laravel</title>
			{{ HTML::style('css/uikit.almost-flat.min.css') }}
			{{ HTML::script('js/jquery.min.js') }}
			{{ HTML::script('js/uikit.min.js') }}
		</head>
		<body>
			<div class="uk-container uk-container-center uk-margin-top">
			<nav class="uk-navbar">
			<a href="#" class="uk-navbar-brand uk-hidden-small">Larapus</a>
			<div class="uk-navbar-flip uk-navbar-content">
				<a class="" href=" {{ URL::to('login') }}">Login</a> | 
				<a class="" href="#">Daftar</a>
			</div>
			<div class="uk-navbar-brand uk-navbar-center uk-visible-small">Larapus</div>
			</nav>
			<div class="uk-container-center uk-margin-top">
			@include('larapus.layout.alert')
			@yield('content')
			</div>
		</div>
	</body>
</html>	