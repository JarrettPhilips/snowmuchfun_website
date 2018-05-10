var map;
var marker_bike = [];
var marker_climb = [];
var marker_hike = [];
var marker_ski = [];
var count_bike = 0;
var count_climb = 0;
var count_hike = 0;
var count_ski = 0;
var climb_place = ['EiRTaGVsZiBSZCwgQ2HDsW9uIENpdHksIENPIDgxMjEyLCBVU0E',
					'ChIJSY4n20iTa4cR3o27gOAV59k',
					'ChIJB95FnoiZa4cRubxPoXScpJo',
					'ChIJTbWm3slaE4cRh4KiIfmuDC4',
					'ChIJ8Wo3SfxeP4cRvIuts5LWMT8',
					'ChIJ15RzCnwRaYcR1EbLsraZCss',
					'ChIJIS5HT-v-RocRP4ulj0_qqF8',
		  			'ChIJm3oYdNA4QYcRZxwrnFJj8eU',
					'ChIJz54lVD8nR4cRR80V3ai7BDg',
					'ChIJZyl2riljaYcRKICagAWbdqk'];
var bike_place = ['ChIJVW4bySWla4cRaD9fkeKanvs',
					'ChIJvV4onwjua4cRHSZ-bMRpYPw',
					'EilUcmFpbCBSaWRnZSBSZCwgR3JhbmQgTGFrZSwgQ08gODA0NDcsIFVTQQ',
					'ChIJc_TmcHvYPocR4eO6cSF37jg',
					'ChIJaZ38Yam_a4cRhBs7Z7imOQU',
					'ChIJxTW7otMPEocRbHmbW1akpu0',
		 			'ChIJBdjUnQhJaYcRrpL6bNikFvQ',
					'ChIJzxcfI6qAa4cR1jaKJ_j0jhE',
					'ChIJnZcIOySRaocRIe3o34kwpEU',
					'ChIJV3DnIuPWRocRVny_zlH0Y8w',
					'ChIJLyQrCbnJPocRNJfZFs1QpqU'];
var hike_place = ['ChIJs67WrVNXE4cRZi0KU4Dnfc0',
					'ChIJE3fMtNlhOYcRA09S8KXgs8c',
					'ChIJ18hsDtqCa4cRrdYsOQfng3w',
					'ChIJwd_EEkfsa4cRqy6eShKXFXY',
					'ChIJw7R-_C1BbocRlaEOt-HIAM4',
		 			'ChIJib5b2eOjQYcRFus-QHo2gP0',
					'ChIJXXSu2LhuQocRI58fmBc30yI',
					'ChIJZ58WZe2eaocR0-Zc9oQXVV8',
					'ChIJqTkv8DZ-aocRDZ5Uo7NchRo',
					'ChIJA1bLrtxEQIcRZT-wIt9hnu0'];
var ski_place = ['ChIJjxt7zM1HQIcRYFVYkLuaAco',
					'ChIJMeI60rXKa4cRxrRKAsrYB3o',
					'ChIJ49M4ij5yQIcRn_Pn1RluADc',
					'ChIJBRVVOPlfaocR7pkVWFnW76c',
					'ChIJsVch7dLHa4cR6RwKCvhx_l0',
					'ChIJW_aKIwJaaocRr6sP37eZJ_M',
					'ChIJ29swxmBwaocRoq1FSy3Pwqc',
					'ChIJ49M4ij5yQIcRn_Pn1RluADc',
					'ChIJzbcckqIJPocR-zVp8LqNQOU',
					'ChIJAa66labzaocR2xALA-TNhhM'];

function initMap() {
    var gps = {lat: 38.75, lng: -104.92};
    map = new google.maps.Map(document.getElementById('mapDiv'), {
        center: gps,
        zoom: 7,
        mapTypeId: google.maps.MapTypeId.HYBRID
    });

    var infowindow = new google.maps.InfoWindow();
}

function loadClimbingIcons() {
  // Climbing icons
  if(count_climb == 0){

	  var service = new google.maps.places.PlacesService(map); 
	    for (var i=0; i<climb_place.length; i++) {
	  service.getDetails({
	            placeId: climb_place[i]
	  }, function(place, status) {
	            if (status === google.maps.places.PlacesServiceStatus.OK) {
	    var marker = new google.maps.Marker({
	        map: map,
	        position: place.geometry.location,
	        icon: "Images/climb.png"
	    });
	    marker_climb.push(marker);
	    google.maps.event.addListener(marker, 'click', function() {
	      document.getElementById('location_name').innerHTML = place.name;
	      showWeather(place.geometry.location.lat(), place.geometry.location.lng());
	                        comments();
	        infowindow.setContent('<div><strong>' + place.name + '</strong><br>' +
	            'Temp: ' + '38' + '<br>' + 'Humidity: 65%' + '<br>' + 'Overview: Clear' + '</div>');
	        infowindow.open(map, this);
	    });
	            }
	  });
	    }
	    document.getElementById('climb_button').style = "background-color: var(--tertiary-color);";
	    document.getElementById('climb_button').style = "color: var(--primary-color);";
	}
	else {
		if(count_climb%2 == 1){
			for (var i=0; i<marker_climb.length; i++) {
	    		marker_climb[i].setVisible(false);
			}
			document.getElementById('climb_button').style = "background-color: var(--primary-color);";
			document.getElementById('climb_button').style = "color: var(--secondary-color);";
		}
		else{
			for (var i=0; i<marker_climb.length; i++) {
	    		marker_climb[i].setVisible(true);
			}
			document.getElementById('climb_button').style = "background-color: var(--tertiary-color);";
			document.getElementById('climb_button').style = "color: var(--primary-color);";
		}
	}
	count_climb = count_climb+1;
}


function loadBikingIcons() {
  // biking icons
  if(count_bike == 0){
	  var service = new google.maps.places.PlacesService(map); 
	    for (var i=0; i<bike_place.length; i++) {
	  service.getDetails({
	            placeId: bike_place[i]
	  }, function(place, status) {
	            if (status === google.maps.places.PlacesServiceStatus.OK) {
	    var marker = new google.maps.Marker({
	        map: map,
	        position: place.geometry.location,
	        icon: "Images/cycling.png"
	    });
	    marker_bike.push(marker);
	    google.maps.event.addListener(marker, 'click', function() {
	      document.getElementById('location_name').innerHTML = place.name;
	      showWeather(place.geometry.location.lat(), place.geometry.location.lng());
	                        comments();
	        infowindow.setContent('<div><strong>' + place.name + '</strong><br>' +
	            'Temp: ' + '38' + '<br>' + 'Humidity: 65%' + '<br>' + 'Overview: Clear' + '</div>');
	        infowindow.open(map, this);
	    });
	            }
	  });
	    }
	    document.getElementById('bike_button').style = "background-color: var(--tertiary-color);";
	    document.getElementById('bike_button').style = "color: var(--primary-color);";
	}
	else {
		if(count_bike%2 == 1){
			for (var i=0; i<marker_bike.length; i++) {
	    		marker_bike[i].setVisible(false);
			}
			document.getElementById('bike_button').style = "background-color: var(--primary-color);";
			document.getElementById('bike_button').style = "color: var(--secondary-color);";
		}
		else{
			for (var i=0; i<marker_bike.length; i++) {
	    		marker_bike[i].setVisible(true);
			}
			document.getElementById('bike_button').style = "background-color: var(--tertiary-color);";
			document.getElementById('bike_button').style = "color: var(--primary-color);";
		}
	}
	count_bike = count_bike+1;

}
function loadSkiingIcons() {
  // skiing icons
  if(count_ski == 0){
	  var service = new google.maps.places.PlacesService(map); 
	    for (var i=0; i<ski_place.length; i++) {
	  service.getDetails({
	            placeId: ski_place[i]
	  }, function(place, status) {
	            if (status === google.maps.places.PlacesServiceStatus.OK) {
	    var marker = new google.maps.Marker({
	        map: map,
	        position: place.geometry.location,
	        icon: "Images/skiing.png"
	    });
	    marker_ski.push(marker);
	    google.maps.event.addListener(marker, 'click', function() {
	      document.getElementById('location_name').innerHTML = place.name;
	      showWeather(place.geometry.location.lat(), place.geometry.location.lng());
	                        comments();
	        infowindow.setContent('<div><strong>' + place.name + '</strong><br>' +
	            'Temp: ' + '38' + '<br>' + 'Humidity: 65%' + '<br>' + 'Overview: Clear' + '</div>');
	        infowindow.open(map, this);
	    });
	            }
	  });
	    }
	    document.getElementById('ski_button').style = "background-color: var(--tertiary-color);";
	    document.getElementById('ski_button').style = "color: var(--primary-color);";
	}
	else {
		if(count_ski%2 == 1){
			for (var i=0; i<marker_ski.length; i++) {
	    		marker_ski[i].setVisible(false);
			}
			document.getElementById('ski_button').style = "background-color: var(--primary-color);";
			document.getElementById('ski_button').style = "color: var(--secondary-color);";
		}
		else{
			for (var i=0; i<marker_ski.length; i++) {
	    		marker_ski[i].setVisible(true);
			}
			document.getElementById('ski_button').style = "background-color: var(--tertiary-color);";
			document.getElementById('ski_button').style = "color: var(--primary-color);";
		}
	}
	count_ski = count_ski + 1;

}
function loadHikingIcons() {
  // hiking icons
  if(count_hike == 0){
	  var service = new google.maps.places.PlacesService(map); 
	    for (var i=0; i<hike_place.length; i++) {
	  service.getDetails({
	            placeId: hike_place[i]
	  }, function(place, status) {
	            if (status === google.maps.places.PlacesServiceStatus.OK) {
	    var marker = new google.maps.Marker({
	        map: map,
	        position: place.geometry.location,
	        icon: "Images/hiking.png"
	    });
	    marker_hike.push(marker);
	    google.maps.event.addListener(marker, 'click', function() {
	      document.getElementById('location_name').innerHTML = place.name;
	      showWeather(place.geometry.location.lat(), place.geometry.location.lng());
	      comments();
	        infowindow.setContent('<div><strong>' + place.name + '</strong><br>' +
	            'Temp: ' + '38' + '<br>' + 'Humidity: 65%' + '<br>' + 'Overview: Clear' + '</div>');
	        infowindow.open(map, this);
	    });
	            }
	  });
	    }
	    document.getElementById('hike_button').style = "background-color: var(--tertiary-color);";
	    document.getElementById('hike_button').style = "color: var(--primary-color);";
	}
	else {
		if(count_hike%2 == 1){
			for (var i=0; i<marker_hike.length; i++) {
	    		marker_hike[i].setVisible(false);
			}
			document.getElementById('hike_button').style = "background-color: var(--primary-color);";
			document.getElementById('hike_button').style = "color: var(--secondary-color);";
		}
		else{
			for (var i=0; i<marker_hike.length; i++) {
	    		marker_hike[i].setVisible(true);
			}
			document.getElementById('hike_button').style = "background-color: var(--tertiary-color);";
			document.getElementById('hike_button').style = "color: var(--primary-color);";
		}
	}
	count_hike = count_hike+1;
}




// Weather Functions

function showWeather(lat, long) {
    var url = `https://api.darksky.net/forecast/5d43c2767b350cf93ce481a6b64b630b/${lat},${long}` + `?format=jsonp&callback=displayWeather`;
    var script = document.createElement("script");
    script.type = "text/javascript";
    script.src = url;
    document.getElementsByTagName("head")[0].appendChild(script);
    displayWeather(object)
}

var object;

 function displayWeather(object) {
 	document.getElementById('results_S').innerHTML = object.currently.summary;
 	document.getElementById('results_H').innerHTML = "Humidity: " + object.currently.humidity.toFixed(2)*100 + "%";
 	document.getElementById('results_T').innerHTML = object.currently.temperature.toFixed(0) + "\xb0";
 	document.getElementById('results_WS').innerHTML = "Wind Speed: " + object.currently.windSpeed.toFixed(1) + " MPH";
 	document.getElementById('results_WD').innerHTML = "Wind Direction: " + object.currently.windBearing + "\xb0";
 	document.getElementById('results_V').innerHTML = "Visibility: " + object.currently.visibility.toFixed(1) + " Miles";
 	document.getElementById('results_CC').innerHTML = "Cloud Cover: " + object.currently.cloudCover*100 + "%";
 	document.getElementById('results_RPR').innerHTML = "Precip Rate: " + object.currently.precipIntensity.toFixed(3) + " IN/HR";
 	document.getElementById('results_SF').innerHTML = "Snowfall: " + object.currently.precipAccumulation + " IN";
 	document.getElementById('results_UV').innerHTML = "UVI: " + object.currently.uvIndex;
        document.getElementById('side_weather').src = "Images/" + object.currently.icon + ".png";
    console.log(object);
 }

function comments(){
        $.post('/snowmuchfun.sportsontheweb.net/getComments.php', {
          loc: document.getElementById('location_name').innerHTML
        });
        document.getElementById('location_name').innerHTML = "apple";
}
