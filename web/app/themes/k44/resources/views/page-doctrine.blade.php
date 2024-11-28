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
        @foreach ($doctrine as $item)
          <div class="content-audio" data-date="{{ date('Y-m-d', strtotime(str_replace('/', '-', $item['date']))) }}">
            <div class="content-audio__infos">
              <div class="content-audio__info">
                @if ($item['author']['avatar'])
                  <img src="{{ $item['author']['avatar']['url'] }}" class="content-audio__img" alt="{{ $item['author']['avatar']['alt'] }}" width="{{ $item['author']['avatar']['width'] }}" height="{{ $item['author']['avatar']['height'] }}">
                @else
                  <img src="@asset('./images/user.png')" class="content-audio__img" alt="avatar" width="75" height="75">
                @endif
                <div class="content-audio__data">
                  <h3 class="content-audio__name">{{ $item['author']['name'] }}</h3>
                  <p class="content-audio__description">{{ $item['description'] }}</p>
                </div>
              </div>

              <div class="content-audio__date">
                @php $data = explode('/', $item['date']); @endphp
                <p class="content-audio__date-day">{{ $data[0] }}</p>
                <p class="content-audio__date-mo">{{ $data[1] . '.' . $data[2] }}</p>
              </div>
            </div>

            <audio controls>
              <source src="{{ $item['link'] }}" type="audio/mpeg">
              Your browser does not support the audio element.
            </audio>
          </div>
        @endforeach
      </div>
      <div class="content__nav">
        @include('partials.searchform')
        <div id="calendar"></div>
      </div>
    </div>
  </section>
@endsection
