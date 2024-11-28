@extends('layouts.app')

@section('content')
  <section class="top" style="background-image: url('{{ $back_image->top_image['url'] }}')" width="{{ $back_image->top_image['width'] }}" height="{{ $back_image->top_image['height'] }}">
    <div class="container">
      <h1 class="top__title">{{ get_the_title() }}</h1>
      <p class="top__subtitle">{{ get_the_excerpt() }}</p>
      @include('partials.breadcrumbs')
    </div>
  </section>

  <section class="content">
    <div class="container">
      @foreach ($songs as $song)
        <div class="song {{ !empty($_GET['song']) ? 'song__full' : '' }}">
          <p class="song__name">{{ $song->name }}</p>
          @if (!empty($_GET['song']))
            <div class="song__text">{{ $song->text }}</div>
          @else
            <a href="?song={{ $song->id }}" class="btn btn__standart">Детальніше</a>
          @endif
        </div>
      @endforeach
    </div>
  </section>
@endsection
