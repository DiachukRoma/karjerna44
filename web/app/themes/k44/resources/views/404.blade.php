@extends('layouts.app')

@section('content')
<section class="top" style="background-image: url('{{ $back_image->top_image['url'] }}')"
  width="{{ $back_image->top_image['width'] }}" height="{{ $back_image->top_image['height'] }}">
  <div class="container">
    <h1 class="top__title">404</h1>
    <p class="top__subtitle">{{ __('Сторінка не знайдена') }}</p>
  </div>
</section>

<section class="content">
  <div class="container">
    <div class="alert alert-warning">
      <h2>{{ __('Вибачте, але сторінка, яку ви намагалися переглянути, не існує.', 'k44') }}</h2>
    </div>
  </div>
</section>
@endsection