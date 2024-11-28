import { Loader } from 'google-maps';
import jQuery from 'jquery'

jQuery(document).on('ready', function ($) {
  const loader = new Loader('AIzaSyA85cnYnOaeQeODj0KbFAd-21kDX4ILkj0', {});

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
