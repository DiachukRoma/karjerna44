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
						<div class="content__data">
								@foreach ($content as $item)
										<x-dynamic-component :component="'content-' . $item['acf_fc_layout']" :item="$item" />
								@endforeach
						</div>
						<div class="content__nav">
								<ul><!-- here JS will be adding list of content titles --></ul>
						</div>
				</div>
		</section>
@endsection
