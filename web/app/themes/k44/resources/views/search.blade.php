@extends('layouts.app')

@section('content')
		<section class="top" style="background-image: url('{{ $back_image->top_image['url'] }}')" width="{{ $back_image->top_image['width'] }}" height="{{ $back_image->top_image['height'] }}">
				<div class="container">
						<h1 class="top__title">Пошук...</h1>
				</div>
		</section>

		<section class="content">
				<div class="container">
						@if (!have_posts())
								<div class="alert alert-warning">
										{{ __('Вибачте, результатів не знайдено.', 'sage') }}
								</div>
						@else
								<div class="content__results">
										@while (have_posts())
												@php
														the_post();
														$post = $obj->getPostData(get_post());
												@endphp

												@include('partials.search', ['post' => $post])
										@endwhile
								</div>
								{!! get_the_posts_navigation(['next_text' => 'Попередня сторінка', 'prev_text' => 'Наступна сторінка', 'screen_reader_text' => ' ', 'class' => 'search__navigation']) !!}
						@endif
				</div>
		</section>
@endsection
