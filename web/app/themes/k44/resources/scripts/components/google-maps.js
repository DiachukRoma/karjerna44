export function googleMaps(apiKey) {
    return new Promise((resolve) => {
        window._initGoogleMaps = () => {
            resolve(window.google);
        };

        const script = document.createElement('script');
        script.src = `https://maps.googleapis.com/maps/api/js?key=${apiKey}&callback=_initGoogleMaps&libraries=marker&loading=async`;
        script.async = true;
        script.defer = true;
        document.head.appendChild(script);
    });
}