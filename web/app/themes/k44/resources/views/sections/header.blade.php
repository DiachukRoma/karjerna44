<header class="header">
  <div class="container">
    <div class="header__row">
      <div class="header__logo">
        <a href="{{ $home_link }}">
          <img src="@asset('./images/header__logo.svg')" alt="header logo" width="60" height="60">
        </a>
      </div>

      <div class="header__search">
        {{ get_search_form() }}
      </div>

      <div class="header__burger-box">
        <div class="header__burger">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>

      <div class="header__menu">
        <nav class="header__nav-primary">
          @if (has_nav_menu('primary_navigation'))
            {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
          @endif
        </nav>
        <div class="header__infos">
          <div class="header__info">
            <div class="header__info-box">
              <strong>Наша адреса:</strong>
              <p>{!! $side_menu->address !!}</p>
            </div>
            <div class="header__info-box">
              <strong>Контакти:</strong>
              <p>{!! $side_menu->phone_1 !!}</p>
              <p>{!! $side_menu->phone_2 !!}</p>
            </div>
          </div>
          <div class="header__info">
            <div class="header__info-box">
              <strong>Соцiальнi мережi:</strong>
              <div class="socials">
                @if ($side_menu->facebook)
                  <a href="{{ $side_menu->facebook }}" target="_blank" class="socials__social">
                    <img src="@asset('./images/facebook.svg')" alt="facebook" width="16" height="16">
                  </a>
                @endif
                @if ($side_menu->instagram)
                  <a href="{{ $side_menu->instagram }}" target="_blank" class="socials__social">
                    <img src="@asset('./images/instagram.svg')" alt="instagram" width="16" height="16">
                  </a>
                @endif
                @if ($side_menu->youtube)
                  <a href="{{ $side_menu->youtube }}" target="_blank" class="socials__social">
                    <img src="@asset('./images/youtube.svg')" alt="youtube" width="21" height="16">
                  </a>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
