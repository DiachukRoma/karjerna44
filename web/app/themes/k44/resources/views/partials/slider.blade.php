<div class="slider {{ $class }}__slider">
  @foreach ($posts as $post)
    @if ($class == 'ministers')
        <x-minister-slide :post="$post" />
    @else
      @include('components.slide', ['post' => $post])
    @endif
  @endforeach
</div>

<div class="slider__navigation {{ $class }}__navigation">
  <div class="slider__navigation-block slider__arrows">
    <button type="button" class="slider__arrow slider__arrows-left {{ $class }}__navigation-arrows-left">
      <svg xmlns="http://www.w3.org/2000/svg" width="10" height="20" viewBox="0 0 10 20" fill="none">
        <path
          d="M9.37659 19.3132C9.53474 19.3132 9.69658 19.2506 9.81795 19.1293C10.0607 18.8865 10.0607 18.4893 9.81795 18.2466L1.50975 9.9384L9.69658 1.75157C9.93932 1.50883 9.93932 1.11163 9.69658 0.868889C9.45384 0.626152 9.05664 0.626152 8.8139 0.868889L0.182052 9.49706C-0.0606841 9.7398 -0.0606841 10.137 0.182052 10.3797L8.93159 19.1293C9.05664 19.2543 9.21477 19.3132 9.37659 19.3132Z"
          fill="white" />
      </svg>
    </button>
    <button type="button" class="slider__arrow slider__arrows-right {{ $class }}__navigation-arrows-right">
      <svg xmlns="http://www.w3.org/2000/svg" width="10" height="20" viewBox="0 0 10 20" fill="none">
        <path
          d="M0.623409 0.686829C0.465262 0.686829 0.30342 0.749352 0.182052 0.87072C-0.0606842 1.11346 -0.0606842 1.51066 0.182052 1.7534L8.49025 10.0616L0.30342 18.2484C0.0606833 18.4912 0.0606833 18.8884 0.30342 19.1311C0.546156 19.3738 0.943361 19.3738 1.1861 19.1311L9.81795 10.5029C10.0607 10.2602 10.0607 9.863 9.81795 9.62026L1.06841 0.87072C0.943362 0.745674 0.785233 0.686829 0.623409 0.686829Z"
          fill="white" />
      </svg>
    </button>
  </div>
  <div class="slider__navigation-block slider__dots {{ $class }}__dots"></div>
  <div class="slider__navigation-block">
    @if (isset($link))
      <a href="{{ $link->url }}" class="btn btn__standart">{{ $link->title }}</a>
    @endif
  </div>
</div>
