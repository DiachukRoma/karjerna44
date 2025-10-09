import domReady from '@roots/sage/client/dom-ready';
import 'slick-carousel';
import $ from 'jquery';
import { donation } from '../components/donation';
import { googleMaps } from '../components/google-maps';

domReady(async () => {
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

  const google = await googleMaps(themeData.googleApiKey);

  const coordinates = { lat: 50.430249719290615, lng: 30.439162423300274 };
  const map = new google.maps.Map(document.getElementById('map'), {
    center: coordinates,
    zoom: 15,
    mapId: 'bf8c9b0c12f4fefe',
    disableDefaultUI: true,
  });

  new google.maps.marker.AdvancedMarkerElement({
    map,
    position: coordinates,
    title: "Кар'єрна 44",
  });

  donation();
});