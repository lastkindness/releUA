jQuery(function () {
    mapBox();
});
function mapBox () {
    var mapSectionBox = document.getElementById('map-section-box');
    if(mapSectionBox) {
        var map = new google.maps.Map(document.getElementById('map-section-box'), {
            center: { lat: 0, lng: 0 },
            zoom: 10,
            zoomControl: true
        });
        var coordinates = [];
        var markerInfo = [];
        for (var i = 0; i <= 100; i++) {
            var dataObject = mapSectionBox.getAttribute('data-object' + i);
            var infoObject = mapSectionBox.getAttribute('data-info' + i);
            if (dataObject) {
                var latLng = dataObject.split(',').map(function(coord) {
                    return parseFloat(coord.trim());
                });
                coordinates.push({ lat: latLng[0], lng: latLng[1] });
                if (infoObject) {
                    markerInfo.push(infoObject);
                } else {
                    markerInfo.push(''); // Add empty string if no info provided
                }
            } else {
                break;
            }
        }

        // Create markers for each coordinate
        var markers = coordinates.map(function(coord, index) {
            var marker = new google.maps.Marker({
                position: coord,
                map: map
            });
            // Add event listener for mouseover to show info window
            marker.addListener('mouseover', function() {
                var infoWindow = new google.maps.InfoWindow({
                    content: markerInfo[index] // Use corresponding marker info
                });
                infoWindow.open(map, marker);
            });
            return marker;
        });

        // Fit map bounds to markers
        var bounds = new google.maps.LatLngBounds();
        markers.forEach(function(marker) {
            bounds.extend(marker.getPosition());
        });
        map.fitBounds(bounds);

        // Adjust zoom level if it exceeds the max zoom
        var maxZoomService = new google.maps.MaxZoomService();
        maxZoomService.getMaxZoomAtLatLng(bounds.getCenter(), function(response) {
            if (map.getZoom() > response.zoom) {
                map.setZoom(response.zoom);
            }
        });
    }
}
