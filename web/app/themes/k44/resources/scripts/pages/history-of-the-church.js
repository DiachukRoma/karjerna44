import './lsb.min.js';
import 'slick-carousel';
import $ from 'jquery'

$(function () {
  const sections = $('h2, h3, h4');
  sections.each((index, item) => {
    $(item).attr('id', `section_${index}`)
    $('.content__nav ul').append(`<li><a href="#section_${index}">${$(item).text()}</a></li>`)
  })

  $('a[href^="#"]').on('click', function (e) {
    e.preventDefault();

    const href = $(this).attr('href');
    $('html, body').animate({
      'scrollTop': $(href).offset().top - 80,
    }, 400);
  });

  const updateActiveLink = () => {
    $(window).scroll(function () {
      sections.each(function () {
        const sectionId = $(this).attr('id');
        const sectionTop = $('#' + sectionId).offset().top - window.outerHeight / 2;

        if ($(window).scrollTop() >= sectionTop) {
          $('.content__nav a').removeClass('active');
          $('.content__nav a[href="#' + sectionId + '"]').addClass('active');
        }
      });
    });
  };

  if (window.innerWidth >= 768) {
    updateActiveLink();

    $(window).scroll(() => {
      updateActiveLink();
    });
  }

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
    $.fn.lightspeedBox({ showImageCount: false });
  }
});