import jQuery from 'jquery'

jQuery(document).on('ready', function ($) {
  $('.header__burger').on('click', function () {
    $('.header__burger, .header__menu, .header').toggleClass('active');
    $('body').toggleClass('overflow-h');
  });

  $(window).scroll(function () {
    $(this).scrollTop() > 20 ? $('.header').addClass('scrolled') : $('.header').removeClass('scrolled');
  });
});
