<!DOCTYPE html>
<html>
<head>
	<title>@yield('title') | LaraPus</title>
	{{ HTML::style('css/uikit.almost-flat.min.css') }}
	{{ HTML::style('css/tambahan/datatable.css') }}
	{{ HTML::script('js/jquery.min.js') }}
	{{ HTML::script('js/uikit.min.js') }}
	@yield('asset')
</head>
<body>
	<div class="uk-container uk-container-center uk-margin-top">
		<nav class="uk-navbar">
			<a href="#" class="uk-navbar-brand uk-hidden-small">Larapus</a>
			<ul class="uk-navbar-nav uk-hidden-small">
				@yield('nav')
			</ul>
			<div class="uk-navbar-flip uk-navbar-content">
				<a href="#">{{ Sentry::getUser()->first_name . ' ' . Sentry::getUser()->last_name }}</a> |
				<a href="{{ URL::to('logout') }}">Logout</a>
			</div>
			<div class="uk-navbar-brand uk-navbar-center uk-visible-small">Larapus</div>
		</nav>
		<div class="uk-container-center uk-margin-top">
			@include('larapus.layout.alert')
			<ul class="uk-breadcrumb">
				@yield('breadcrumb')
			</ul>
			<h1 class="uk-heading-large">
				@yield('title')
				@yield('title-button')
			</h1>
			@include('larapus.layout.validation')
			@yield('content')
		</div>
	</div>
</body>
</html>