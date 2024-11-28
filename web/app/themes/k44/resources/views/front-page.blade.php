@extends('layouts.app')

@section('content')
		<section class="top">
				<div class="container">
						<div class="top__wrap">
								<div class="top__block top__block-first" style="background-image: url('{{ $main->image['url'] }}')">
										<p class="top__block-slug">{{ $main->slug }}</p>
										<h1 class="top__block-title">{{ $main->title }}</h1>
										<p class="top__block-description">{{ $main->description }}</p>
								</div>
								<div class="top__block top__block-second">
										<div class="top__box top__box--light">
												<div class="top__posts">
														<h5 class="top__box-title">Останні події</h5>
														@foreach ($last_events as $item)
																<div class="top__post">
																		<div class="top__post-date">
																				<p class="top__post-date-day">{{ $item->dateDay }}</p>
																				<p class="top__post-date-mo">{{ $item->dateMoAndYear }}</p>
																		</div>
																		<div class="top__post-info">
																				<a href="{{ $item->link }}" class="top__post-title">{{ $item->title }}</a>
																				<a href="{{ $item->link }}" class="top__post-more">Детальнiше</a>
																		</div>
																</div>
														@endforeach
												</div>
												<div class="top__post-all">
														<x-btn-with-arrow title="Переглянути всi" link="/events" :isDark="true"></x-btn-with-arrow>
												</div>
										</div>

										<div class="top__box">
												<div class="top__contact-block">
														<div class="top__contact">
																<strong class="top__contact-title">Наша адреса:</strong>
																<p class="top__contact-info">{!! $side_menu->address !!}</p>
														</div>

														<div class="top__contact">
																<strong class="top__contact-title">Контакти:</strong>
																<p class="top__contact-info">{!! $side_menu->phone_1 !!}</p>
																<p class="top__contact-info">{!! $side_menu->phone_2 !!}</p>
														</div>
												</div>

												<div class="top__contact">
														<strong class="top__contact-title">Соцiальнi мережi:</strong>
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

										@foreach ($main->box as $item)
												<div class="top__box">
														<h5 class="top__box-title">{{ $item['title'] }}</h5>
														<div class="top__box-data">
																<p class="top__box-description">{{ $item['description'] }}</p>
																<x-btn-with-arrow :title="$item['link']['title']" :link="$item['link']['url']" :isDark="false"></x-btn-with-arrow>
														</div>
												</div>
										@endforeach
								</div>
						</div>
				</div>
		</section>

		@if ($worship->isShow)
				<section class="worship">
						<div class="container">
								<h2 class="standart__block-title">{{ $worship->title }}</h2>
								<p class="standart__block-subtitle">{{ $worship->description }}</p>
								@include('partials.slider', ['class' => 'worship', 'posts' => $worship->posts, 'link' => $worship->linkAll])
						</div>
				</section>
		@endif

		@if ($events->isShow)
				<section class="events">
						<div class="container">
								<h2 class="standart__block-title">{{ $events->title }}</h2>
								<p class="standart__block-subtitle">{{ $events->description }}</p>
								@include('partials.slider', ['class' => 'events', 'posts' => $events->posts, 'link' => $events->linkAll])
						</div>
				</section>
		@endif

		@if ($ministers->isShow)
				<section class="ministers">
						<div class="container">
								<h2 class="standart__block-title">{{ $ministers->title }}</h2>
								<p class="standart__block-subtitle">{{ $ministers->description }}</p>
								@include('partials.slider', ['class' => 'ministers', 'posts' => $ministers->posts, 'link' => $ministers->linkAll])
						</div>
				</section>
		@endif

		@if ($contacts->isShow)
				<section class="contacts">
						<div class="container">
								<h2 class="contacts__title standart__block-title">{{ $contacts->title }}</h2>
								<p class="contacts__subtitle standart__block-subtitle">{{ $contacts->description }}</p>
								<div class="contacts__blocks">
										<div class="contacts__block">

												<div class="contacts__contact">
														<strong class="contacts__contact-title">Наша адреса:</strong>
														<p class="contacts__contact-info">{!! $side_menu->address !!}</p>
												</div>

												<div class="contacts__contact">
														<strong class="contacts__contact-title">Контакти:</strong>
														<a href="tel:{!! $side_menu->phone_1 !!}" class="contacts__contact-info">{!! $side_menu->phone_1 !!}</a>
														<a href="tel:{!! $side_menu->phone_2 !!}" class="contacts__contact-info">{!! $side_menu->phone_2 !!}</a>
												</div>

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
										<div class="contacts__block">{!! do_shortcode($contacts->form) !!}</div>
								</div>
						</div>
				</section>
		@endif

		<section class="map">
				<div id="map"></div>
		</section>
@endsection
