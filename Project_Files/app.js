var map;
var marker_bike = [];
var marker_climb = [];
var marker_hike = [];
var marker_ski = [];
var marker_general = [];
var climb_place = ['EiRTaGVsZiBSZCwgQ2HDsW9uIENpdHksIENPIDgxMjEyLCBVU0E','ChIJSY4n20iTa4cR3o27gOAV59k'];
var bike_place = ['ChIJVW4bySWla4cRaD9fkeKanvs','ChIJvV4onwjua4cRHSZ-bMRpYPw'];
var hike_place = ['ChIJs67WrVNXE4cRZi0KU4Dnfc0'];
var ski_place = ['ChIJjxt7zM1HQIcRYFVYkLuaAco'];
var general_place = ['ChIJWd2U7rRQaocRllxVIFIp5Ts','ChIJ06-NJ06Na4cRWIAboHw7Ocg','ChIJ5SL_Vd71aocRHD59U1wlA8s','ChIJeV6vyIahbocRHxIKToC6z9I',
'EiRTaGVsZiBSZCwgQ2HDsW9uIENpdHksIENPIDgxMjEyLCBVU0E','ChIJc_TmcHvYPocR4eO6cSF37jg'];
var climb_count = bike_count = hike_count = ski_count = 0;


function initMap() {
    var gps = {lat: 38.75, lng: -104.92};
    map = new google.maps.Map(document.getElementById('map'), {
        center: gps,
        zoom: 7
    });

    var infowindow = new google.maps.InfoWindow();
    var service = new google.maps.places.PlacesService(map);
    // Climbing icons
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
			document.getElementById('side_icon').src = "Images/climb.png";
			showWeather(place.geometry.location.lat(), place.geometry.location.lng());
                        comments();
		    infowindow.setContent('<div><strong>' + place.name + '</strong><br>' +
					  'Temp: ' + '38' + '<br>' + 'Humidity: 65%' + '<br>' + 'Overview: Clear' + '</div>');
		    infowindow.open(map, this);
		});
            }
	});
    }
    // biking icons
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
			document.getElementById('side_icon').src = "Images/cycling.png";
			showWeather(place.geometry.location.lat(), place.geometry.location.lng());
                        comments();
		    infowindow.setContent('<div><strong>' + place.name + '</strong><br>' +
					  'Temp: ' + '38' + '<br>' + 'Humidity: 65%' + '<br>' + 'Overview: Clear' + '</div>');
		    infowindow.open(map, this);
		});
            }
	});
    }
    // skiing icons
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
    // hiking icons
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
    // general icons
    for (var i=0; i<general_place.length; i++) {
	service.getDetails({
            placeId: general_place[i]
	}, function(place, status) {
            if (status === google.maps.places.PlacesServiceStatus.OK) {
		var marker = new google.maps.Marker({
		    map: map,
		    position: place.geometry.location,
		});
		marker_general.push(marker);
		google.maps.event.addListener(marker, 'click', function() {
			
			document.getElementById('location_name').innerHTML = place.name;
			document.getElementById('climbing_count').innerHTML = climb_count;
			document.getElementById('cycling_count').innerHTML = bike_count;
			document.getElementById('hiking_count').innerHTML = hike_count;
			document.getElementById('skiing_count').innerHTML = ski_count;
			oReq.open("get", "getCounts.php", true);
    //                               ^ Don't block the rest of the execution.
    //                                 Don't wait until the request finishes to 
    //                                 continue.
			oReq.send();
			showWeather(place.geometry.location.lat(), place.geometry.location.lng());
			comments();
		    infowindow.setContent('<div><strong>' + place.name + '</strong><br>' +
					  'Temp: ' + '38' + '<br>' + 'Humidity: 65%' + '<br>' + 'Overview: Clear' + '</div>');
		    infowindow.open(map, this);
		});
            }
	});
    }
}
function reqListener () {
      console.log(this.responseText);
}

var oReq = new XMLHttpRequest(); //New request object
oReq.onload = function() {
	//This is where you handle what to do with the response.
	//The actual data is found on this.responseText
	hike_count = this.responseText; //Will alert: 42
};
    
function checkBike(){
    var checkbox = document.getElementById('Biking');
    if (checkbox.checked == true){
	for (var i=0; i<marker_bike.length; i++) {
	    marker_bike[i].setVisible(true);
	}
        
    } else {
	for (var i=0; i<marker_bike.length; i++) {
	    marker_bike[i].setVisible(false);
	}
    }
}
function checkClimb(){
    var checkbox = document.getElementById('Climbing');
    if (checkbox.checked == true){
	for (var i=0; i<marker_climb.length; i++) {
	    marker_climb[i].setVisible(true);
	    climb_count = 1;
	}
        
    } else {
	for (var i=0; i<marker_climb.length; i++) {
	    marker_climb[i].setVisible(false);
	    climb_count = 0;
	}
    }
}
function checkSki(){
    var checkbox = document.getElementById('Skiing');
    if (checkbox.checked == true){
	for (var i=0; i<marker_ski.length; i++) {
	    marker_ski[i].setVisible(true);
	    
	}
        
    } else {
	for (var i=0; i<marker_ski.length; i++) {
	    marker_ski[i].setVisible(false);
	}
    }
}
function checkHike(){
    var checkbox = document.getElementById('Hiking');
    if (checkbox.checked == true){
	for (var i=0; i<marker_hike.length; i++) {
	    marker_hike[i].setVisible(true);
	}
        
    } else {
	for (var i=0; i<marker_hike.length; i++) {
	    marker_hike[i].setVisible(false);
	}
    }
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
 	document.getElementById('results_H').innerHTML = "Humidity: " + object.currently.humidity*100 + " %";
 	document.getElementById('results_T').innerHTML = object.currently.temperature + " \xb0F";
        document.getElementById('side_weather').src = "Images/" + object.currently.icon + ".png";
    console.log(object);
 }

function comments(){
        $.post('/snowmuchfun.sportsontheweb.net/getComments.php', {
          loc: document.getElementById('location_name').innerHTML
        });
        document.getElementById('location_name').innerHTML = "apple";
}
