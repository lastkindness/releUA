jQuery(function () {
    singlePostMap();
});

function singlePostMap () {
    var mapBox = document.getElementById('map-box');
    if(mapBox) {
        var objectData = mapBox.getAttribute('data-object');
        var subwayData = mapBox.getAttribute('data-subway');
        var objectCoordinates = objectData.split(',');
        var pointA = { lat: parseFloat(objectCoordinates[0]), lng: parseFloat(objectCoordinates[1]) };
        var subwayCoordinates = subwayData.split(',');
        var pointB = { lat: parseFloat(subwayCoordinates[0]), lng: parseFloat(subwayCoordinates[1]) };
        // Create a map centered at point A
        var map = new google.maps.Map(document.getElementById('map-box'), {
            zoom: 15,
            center: pointA
        });

        // Create a directions service object to use the route method and get a set of points
        var directionsService = new google.maps.DirectionsService();

        // Create a directions renderer to display the route on the map
        var directionsRenderer = new google.maps.DirectionsRenderer();
        directionsRenderer.setMap(map);

        // Define the request object for directions service
        var request = {
            origin: pointA,
            destination: pointB,
            travelMode: 'WALKING' // You can change this to other travel modes if needed
        };

        // Use the directions service to get the route
        directionsService.route(request, function(response, status) {
            if (status == 'OK') {
                // Display the route on the map
                directionsRenderer.setDirections(response);
                var duration = response.routes[0].legs[0].duration.text;
                console.log('duration = ', duration);
                var duration = response.routes[0].legs[0].duration.text;

                // Define position for the info window
                var infoWindowPosition = new google.maps.LatLng(
                    (pointA.lat + pointB.lat) / 2, // Average latitude
                    (pointA.lng + pointB.lng) / 2  // Average longitude
                );

                // Create an info window with the duration information
                var infoWindow = new google.maps.InfoWindow({
                    content: '<div>Route duration: ' + duration + '</div>',
                    position: infoWindowPosition,
                    map: map
                });
            } else {
                window.alert('Directions request failed due to ' + status);
            }
        });
    }
}
