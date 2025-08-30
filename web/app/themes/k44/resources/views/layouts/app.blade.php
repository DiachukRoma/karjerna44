<!doctype html>
<html @php(language_attributes())>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	@php(do_action('get_header'))
	@php(wp_head())
</head>

<body @php(body_class())>
	@php(wp_body_open())
	<div id="app">
		@include('sections.header')
		<div class="wrap site__container" role="document">
			<main class="main">
				@yield('content')
			</main>
		</div>
		@include('sections.footer')
	</div>

	{{-- <div class="preloader">
		<img src="@asset('./images/search.svg')" alt="search button" width="24" height="24">
	</div> --}}

	@php(do_action('get_footer'))
	@php(wp_footer())
</body>

</html>