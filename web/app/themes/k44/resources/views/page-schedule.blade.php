@extends('layouts.app')

@section('content')
		<section class="top" style="background-image: url('{{ $back_image->top_image['url'] }}')" width="{{ $back_image->top_image['width'] }}" height="{{ $back_image->top_image['height'] }}">
				<div class="container">
						<h1 class="top__title">{{ $title }}</h1>
						<p class="top__subtitle">{{ $subtitle }}</p>
						@include('partials.breadcrumbs')
				</div>
		</section>

		<section class="content">
				<div class="container">
						<div class="schedule">
								@foreach ($schedule as $item)
										<div class="single__schedule">
												<h3 class="single__schedule-title">{!! $item['title'] !!}</h3>
												<p class="single__schedule-description">{!! $item['description'] !!}</p>
												<div class="single__schedule-info">
														{!! $item['when'] !!}<br><strong>{!! $item['time'] !!}</strong>
												</div>
										</div>
								@endforeach
						</div>
				</div>
		</section>
@endsection
