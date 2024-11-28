import domReady from '@roots/sage/client/dom-ready';
import $ from 'jquery';

/**
 * Application entrypoint
 */
domReady(async () => {
  $('.header__burger').on('click', function () {
    $('.header__burger, .header__menu, .header').toggleClass('active');
    $('body').toggleClass('overflow-h');
  });

  $(window).on('scroll', function () {
    $(this).scrollTop() > 20 ? $('.header').addClass('scrolled') : $('.header').removeClass('scrolled');
  });
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);
