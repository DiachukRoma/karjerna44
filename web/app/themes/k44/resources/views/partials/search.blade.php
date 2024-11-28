<div class="search">
  <a href="{{ $post->link }}" class="search__photo" @if ($post->img) style="background-image: url('{!! $post->img !!}')" @endif>
    @if (!$post->img)
      <span class="search__letters">{{ $post->twoLetters }}</span>
    @endif
  </a>
  <div class="search__date">
    <p class="search__date-day">{{ $post->dateDay }}</p>
    <p class="search__date-mo">{{ $post->dateMoAndYear }}</p>
  </div>
  <div class="search__infos">
    <a href="{{ $post->link }}" class="search__title">{!! $post->title !!}</a>
    <p class="search__description">{!! $post->description !!}</p>
    <a href="{{ $post->link }}" class="search__more">Детальніше</a>
  </div>
</div>
