
function initMap() {
    var gps = {lat: 38.75, lng: -104.92};
    var map = new google.maps.Map(document.getElementById('map'), {
        center: gps,
        zoom: 7
    });

    var infowindow = new google.maps.InfoWindow();
    var service = new google.maps.places.PlacesService(map);

    service.getDetails({
        placeId: 'ChIJfTxB93w5QIcRcvYseNxCK8E'
    }, function(place, status) {
        if (status === google.maps.places.PlacesServiceStatus.OK) {
            var marker = new google.maps.Marker({
		map: map,
		position: place.geometry.location,
		icon: "Images/climb.png"
            });
            google.maps.event.addListener(marker, 'click', function() {
		infowindow.setContent('<div><strong>' + 'Aspen' + '</strong><br>' +
				      'Temp: ' + '38' + '<br>' + 'Humidity: 65%' + '<br>' + 'Overview: Clear' + '</div>');
		infowindow.open(map, this);
            });
        }
    });
    service.getDetails({
        placeId: 'ChIJ06-NJ06Na4cRWIAboHw7Ocg'
    }, function(place, status) {
        if (status === google.maps.places.PlacesServiceStatus.OK) {
            var marker = new google.maps.Marker({
		map: map,
		position: place.geometry.location
            });
            google.maps.event.addListener(marker, 'click', function() {
		infowindow.setContent('<div><strong>' + place.name + '</strong><br>' +
				      'Place ID: ' + place.place_id + '<br>' +
				      place.formatted_address + '</div>');
		infowindow.open(map, this);
            });
        }
    });
}
// Activates knockout.js
ko.applyBindings(viewModel);
initMap();
