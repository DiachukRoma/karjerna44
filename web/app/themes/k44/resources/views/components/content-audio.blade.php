<div class="content-audio">
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
