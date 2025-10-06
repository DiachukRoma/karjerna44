@extends('layouts.app')

@section('content')
<section class="top" style="background-image: url('{{ $back_image->top_image['url'] }}')"
  width="{{ $back_image->top_image['width'] }}" height="{{ $back_image->top_image['height'] }}">
  <div class="container">
    <h1 class="top__title">{{ __('Богослужіння', 'k44') }}</h1>
    <p class="top__subtitle">{{ __('Кожної неділі ми збираємось разом, щоб поклонятися Богові, слухати Його Слово та мати
      спільність один з одним. Приєднуйтесь — ми раді бачити кожного!', 'k44') }}</p>
    @include('partials.breadcrumbs')
  </div>
</section>

<section class="widgets">
  <div class="container">
    <form class="widgets__search">
      <div class="search-form widgets__search-input">
        <button type="submit" class="search-form__submit">
          <img src="@asset('./images/search.svg')" alt="search button" width="24" height="24">
        </button>
        <input type="text" id="text-search" class="search-form__input" value="<?php echo get_search_query(); ?>"
          name="s" placeholder="Пошук..." />
      </div>
      <div class="search-form widgets__search-calendar">
        <button type="submit" class="search-form__submit">
          <img src="@asset('./images/calendar.svg')" alt="search button" width="20" height="20">
        </button>
        <input type="text" id="calendar" class="search-form__input" placeholder="Дата..." readonly />
      </div>
    </form>
  </div>
</section>

<section class="worship" data-post-type="post">
  <div class="container worship__posts">
    @foreach ($posts as $post)
    <x-slide :post="$post" />
    @endforeach
  </div>
  <button id="load-more-posts" class="btn btn__standart worship__load-more">Завантажити ще <img
      src="@asset('./images/loading.svg')" alt="loading" width="28" height="28"></button>
</section>
@endsection