@extends('layouts.app')

@section('content')
<section class="top" style="background-image: url('{{ $back_image->top_image['url'] }}')"
	width="{{ $back_image->top_image['width'] }}" height="{{ $back_image->top_image['height'] }}">
	<div class="container">
		<h1 class="top__title">{{ get_the_title() }}</h1>
		<p class="top__subtitle">{!! get_the_excerpt() !!}</p>
		@include('partials.breadcrumbs')
	</div>
</section>

<section class="contacts">
	<div class="container">
		<div class="contacts__blocks">
			<div class="contacts__block">

				<div class="contacts__contact">
					<strong class="contacts__contact-title">Наша адреса:</strong>
					<p class="contacts__contact-info">{!! $side_menu->address !!}</p>
				</div>

				<div class="contacts__contact">
					<strong class="contacts__contact-title">Контакти:</strong>
					<a href="tel:{!! $side_menu->phone_1 !!}" class="contacts__contact-info">{!! $side_menu->phone_1
						!!}</a>
					<a href="tel:{!! $side_menu->phone_2 !!}" class="contacts__contact-info">{!! $side_menu->phone_2
						!!}</a>
				</div>

				<x-donation />

				<div class="contacts__contact contacts__contact-socials">
					<strong class="contacts__contact-title">Соцiальнi мережi:</strong>
					<div class="socials">
						@if ($side_menu->facebook)
						<a href="{{ $side_menu->facebook }}" target="_blank" class="socials__social">
							<img src="@asset('./images/facebook.svg')" alt="facebook" width="16" height="16">
						</a>
						@endif
						@if ($side_menu->instagram)
						<a href="{{ $side_menu->instagram }}" target="_blank" class="socials__social">
							<img src="@asset('./images/instagram.svg')" alt="instagram" width="16" height="16">
						</a>
						@endif
						@if ($side_menu->youtube)
						<a href="{{ $side_menu->youtube }}" target="_blank" class="socials__social">
							<img src="@asset('./images/youtube.svg')" alt="youtube" width="21" height="16">
						</a>
						@endif
					</div>
				</div>

			</div>
			<div class="contacts__block">{!! do_shortcode($back_image->form) !!}</div>
		</div>
	</div>
</section>

<section class="content">
	<div id="map"></div>
</section>
@endsection