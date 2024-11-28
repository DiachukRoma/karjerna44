@extends('layouts.app')

@section('content')
  <section class="top" style="background-image: url('{{ $back_image->top_image['url'] }}')" width="{{ $back_image->top_image['width'] }}" height="{{ $back_image->top_image['height'] }}">
    <div class="container">
      <h1 class="top__title">404</h1>
      <p class="top__subtitle">Сторінка не знайдена</p>
    </div>
  </section>

  <section class="content">
    <div class="container">
      <div class="alert alert-warning">
        <h2>Вибачте, але сторінка, яку ви намагалися переглянути, не існує.</h2>
      </div>
    </div>
  </section>
@endsection
