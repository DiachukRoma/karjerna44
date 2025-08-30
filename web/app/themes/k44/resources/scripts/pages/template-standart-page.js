import './lsb.min.js';
import 'slick-carousel';
import jQuery from 'jquery';

jQuery(document).on('ready', function () {
  if ($('.content-gallery__slider').length) {
    $('.content-gallery__slider').each((index, item) => {
      const main = $(item);
      const slideCount = parseInt(main.attr('data-slides'));

      $('.slider', main).slick({
        slidesToShow: slideCount,
        slidesToScroll: slideCount,
        prevArrow: $('.slider__arrows-left', main),
        nextArrow: $('.slider__arrows-right', main),
        appendDots: $('.slider__dots', main),
        adaptiveHeight: true,
        dots: true,
        responsive: [
          {
            breakpoint: 1200,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2,
            },
          },
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
            },
          },
        ],
      });
    })
  }

  if ($('.content-gallery').length) {
    $.fn.lightspeedBox({showImageCount: false});
  }
});
