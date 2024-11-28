import { Loader } from 'google-maps';
import $ from 'jquery';
import 'slick-carousel';

$(function () {
  const sliders = ['worship', 'events', 'ministers'];

  sliders.map(item => {
    $(`.${item}__slider`).slick({
      slidesToShow: 3,
      slidesToScroll: 3,
      prevArrow: $(`.${item}__navigation-arrows-left`),
      nextArrow: $(`.${item}__navigation-arrows-right`),
      appendDots: $(`.${item}__dots`),
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
            dots: false
          },
        },
      ],
    });
  })

  const options = {};
  const loader = new Loader('AIzaSyA85cnYnOaeQeODj0KbFAd-21kDX4ILkj0', options);

  loader.load().then(function (google) {
    const coordinates = { lat: 50.430249719290615, lng: 30.439162423300274 };
    const map = new google.maps.Map(document.getElementById('map'), {
      center: coordinates,
      mapId: 'bf8c9b0c12f4fefe',
      zoom: 15,
      disableDefaultUI: true,
    });

    new google.maps.Marker({
      position: coordinates,
      map,
      title: 'Кар\'єрна 44',
    });
  });
});
