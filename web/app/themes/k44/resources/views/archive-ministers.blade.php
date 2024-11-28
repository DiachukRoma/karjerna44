@extends('layouts.app')

@section('content')
  <section class="top" style="background-image: url('{{ $back_image->top_image['url'] }}')" width="{{ $back_image->top_image['width'] }}" height="{{ $back_image->top_image['height'] }}">
    <div class="container">
      <h1 class="top__title">Наші служителі</h1>
      @include('partials.breadcrumbs')
    </div>
  </section>

  <section class="ministers">
    <div class="container">
      @foreach ($ministers as $minister)
        <div class="slide">
          <div class="slide__photo" style="background-image: url('{!! $minister->img !!}')"></div>
          <div class="slide__title">{!! $minister->title !!}</div>
          <p class="slide__tag">{!! $minister->tag !!}</p>
        </div>
      @endforeach
    </div>
  </section>
@endsection
