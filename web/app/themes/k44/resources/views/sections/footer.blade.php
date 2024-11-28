<footer class="footer">
  <div class="container">
    <div class="footer__blocks">
      <div class="footer__block">
        <div class="footer__block-logo">
          <a href="{{ $home_link }}">
            <img src="@asset('./images/footer__logo.svg')" alt="footer logo" width="78" height="78">
          </a>
          <div class="footer__block-slugs">
            <h5 class="footer__block-slug-title">Кар'єрна 44</h5>
            <p class="footer__block-slug">Українська Церква Християн Віри Євангельської</p>
          </div>
        </div>
        <div class="footer__block-socials">
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
      <div class="footer__block">
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
      <div class="footer__block">
        <nav class="footer__nav-primary">
          @if (has_nav_menu('footer_navigation'))
            {!! wp_nav_menu(['theme_location' => 'footer_navigation', 'menu_class' => 'footer__nav']) !!}
          @endif
        </nav>
      </div>
    </div>
  </div>

  <div class="footer__copyright">{!! $side_menu->copyright !!}</div>
</footer>
