<div class="slide">
  <a href="{{ $post->link }}" class="slide__photo" style="background-image: url('{!! $post->img !!}')"></a>
  <div class="slide__date">
    <p class="slide__date-day">{{ $post->dateDay }}</p>
    <p class="slide__date-mo">{{ $post->dateMoAndYear }}</p>
  </div>
  <a href="{{ $post->link }}" class="slide__title">{!! $post->title !!}</a>
  @if (isset($post->tag))
    <p class="slide__tag">{!! $post->tag !!}</p>
  @endif
  <p class="slide__description">{!! $post->description !!}</p>
  <a href="{{ $post->link }}" class="slide__more">Детальніше</a>
</div>
