@extends('layouts.app')

@section('content')
  <section class="top" style="background-image: url('{{ $back_image->top_image['url'] }}')" width="{{ $back_image->top_image['width'] }}" height="{{ $back_image->top_image['height'] }}">
    <div class="container">
      <h1 class="top__title">{{ $main->title }}</h1>
      <p class="top__subtitle">{{ $main->subtitle }}</p>
      @include('partials.breadcrumbs')
    </div>
  </section>

  <section class="content">
    <div class="container">
      @if ($main->online)
        <div class="content__offline">
          <p class="content__offline-title">Для перегляду трансляції - будь ласка, перейдіть на наш канал. Ви також можете відвідати наш Youtube канал для перегляду інших записів служінь.</p>
          <a href="{{ $main->youtube_link }}" target="_blank" class="btn btn__standart">Перейти на Youtube</a>
        </div>
      @else
        <div class="content__offline">
          <p class="content__offline-title">Вибачте, але на разі онлайн трансляція не проводиться. Ви також можете відвідати наш Youtube канал для перегляду інших записів служінь.</p>
          <a href="{{ $side_menu->youtube }}" target="_blank" class="btn btn__standart">Перейти на Youtube</a>
        </div>
      @endif
    </div>
  </section>
@endsection
