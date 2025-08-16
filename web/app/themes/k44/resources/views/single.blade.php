@extends('layouts.app')

@section('content')
  <section class="top" style="background-image: url('{{ $back_image->top_image['url'] }}')" width="{{ $back_image->top_image['width'] }}" height="{{ $back_image->top_image['height'] }}">
    <div class="container">
      <h1 class="top__title">{!! get_the_title() !!}</h1>
      <p class="top__subtitle">{!! get_the_excerpt() !!}</p>
      @include('partials.breadcrumbs')
    </div>
  </section>

  <section class="content">
    <div class="container">
      @foreach ($content as $item)
        @include('components.content-' . $item['acf_fc_layout'], $item)
      @endforeach
    </div>
  </section>

  @if ($related->isShow)
    <section class="content related">
      <div class="container">
        <h2 class="standart__block-title">Схожі записи</h2>
        @include('partials.slider', ['class' => 'related', 'posts' => $related->posts, 'link' => $related->linkAll])
      </div>
    </section>
  @endif
@endsection
