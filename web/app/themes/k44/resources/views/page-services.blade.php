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
      <div class="services">
        @foreach ($services as $item)
          <div class="single__service">
            <div class="single__service-photo" style="background-image: url('{{ $item['photo']['url'] }}')"></div>
            <div class="single__service-info">
              <div>
                @if ($item['isMore'])
                  <a href="{{ $item['more'] }}" class="single__service-title">{!! $item['title'] !!}</a>
                @else
                  <div class="single__service-title">{!! $item['title'] !!}</div>
                @endif
                <p class="single__service-excerpt">{!! $item['description'] !!}</p>
              </div>

              @if ($item['isMore'])
                <a href="{{ $item['more'] }}" class="single__service-more">
                  <span>Детальніше</span>
                  <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="51" height="9" viewBox="0 0 51 9" fill="none">
                      <path
                        d="M50.3536 4.85355C50.5488 4.65829 50.5488 4.34171 50.3536 4.14645L47.1716 0.964466C46.9763 0.769204 46.6597 0.769204 46.4645 0.964466C46.2692 1.15973 46.2692 1.47631 46.4645 1.67157L49.2929 4.5L46.4645 7.32843C46.2692 7.52369 46.2692 7.84027 46.4645 8.03553C46.6597 8.2308 46.9763 8.2308 47.1716 8.03553L50.3536 4.85355ZM0 5H50V4H0L0 5Z"
                        fill="#232323" />
                    </svg>
                  </span>
                </a>
              @endif
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>
@endsection
