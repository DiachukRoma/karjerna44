import domReady from '@roots/sage/client/dom-ready';
import { googleMaps } from '../components/google-maps';
import { donation } from '../components/donation';

domReady(async () => {
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

  /**
   * Donation
   */
  donation();
});
