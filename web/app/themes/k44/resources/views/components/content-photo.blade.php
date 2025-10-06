<div class="content-photo">
  <img src="{{ $item['photo']['url'] }}" class="content-photo-img" alt="{{ $item['photo']['alt'] }}" width="{{ $item['photo']['width'] }}" height="{{ $item['photo']['height'] }}">
  @if ($item['photo']['caption'])
    <span class="content-gallery__slide-alt">{!! $item['photo']['caption'] !!}</span>
  @endif
</div>