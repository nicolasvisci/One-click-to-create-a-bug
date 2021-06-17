<form id="ServiceRequest" >
            <div class="form-group">
                <label class="control-label">Laboratorio:</label>
                <select name="Laboratorio" class="form-control" id="LaboratorioEmail">
                    <option>--all--</option>
                    <option value="1" selected>Service One</option>
                    <option value="2">Service Two</option>
                </select>
            </div>
            <div class="form-group">
                <label for="provider_counter" class="control-label">Laboratori più vicini :</label>
                <div class="text-lg-center alert-danger"id="info"></div>
                <div id="map" style="height: 600px; width:800px;"></div>
                <input id="email" name="email" type="hidden" value="" />
                <input id="lat" type="hidden" value="" />
                <input id="lng" type="hidden" value="" />
                <button type="button" onclick="relatedLocationAjax()"><a style='color:white'>Mostra laboratori più vicini</a></button>
            </div>
            <div id='submit_button'>
                <input class="btn btn-success" type="submit" name="submit" value="add comment"/>
            </div>
        </form>
<script>
var lat = document.getElementById("lat"); // this will select the input with id = lat 
var lng = document.getElementById("lng"); // this will select the input with id = lng
var email = document.getElementById("email"); // this will select the input with id = email 
var locations = [];
var km = 100; // this kilometers used to specify circle wide when use drawcircle function
var circle; // circle variable
var map; // map variable
var mapOptions = {
    zoom: 11,
    center: {lat:41.1122, lng:16.8547}
}; // map options
var markers = []; // markers array ,we will fill it dynamically
var infoWindow = new google.maps.InfoWindow(); // information window ,we will use for our location and for markers
// this will initiate when load the page and have all
function initialize() {
    // set the map to the div with id = map and set the mapOptions as defualt
    map = new google.maps.Map(document.getElementById('map'),
        mapOptions);
    var infoWindow = new google.maps.InfoWindow({map: map});
    // get current location with HTML5 geolocation API.
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };
            lat.value  =  position.coords.latitude;
            lng.value  =  position.coords.longitude;
            email.nodeValue =  position.coords.longitude;
            // set the current posation to the map and create info window with (Here Is Your Location) sentense
            infoWindow.setPosition(pos);
            infoWindow.setContent('Here Is Your Location.');
            // set this info window in the center of the map 
            map.setCenter(pos);
            // draw circle on the map with parameters
            drawCircle(mapOptions, map, pos, km);
        }, function() {
            // if user block the geolocatoon API and denied detect his location
            handleLocationError(true, infoWindow, map.getCenter());
        });
    } else {
        // Browser doesn't support Geolocation
        handleLocationError(false, infoWindow, map.getCenter());
        
    }
}
// to handle user denied
function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(browserHasGeolocation ?
        'Error: User Has Denied Location Detection.' :
        'Error: Your browser doesn\'t support geolocation.');
}
// to draw circle around 30 kilometers to current location
function drawCircle(mapOptions, map, pos, km ) {
    var populationOptions = {
        strokeColor: '#FF0000',
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: '#FF0000',
        fillOpacity: 0.35,
        map: map,
        center: pos,
        radius: Math.sqrt(km*500) * 100
    };
    // Add the circle for this city to the map.
    this.circle = new google.maps.Circle(populationOptions);
}
// this function to get providers with ajax request
function relatedLocationAjax() {
    $.ajax({
        type: "POST",
        url: 'Prenota/closest_locations',
        dataType: "json",
        cache: false,
        data: {latitude: lat.value, longitude: lng.value, email: email.value},
        success:function(data) {
            // when request is successed add markers with results
            add_markers(data);
        }
    });
}
// this function to will draw markers with data returned from the ajax request
function add_markers(data){
    var marker, i;
    var bounds = new google.maps.LatLngBounds();
    var infowindow = new google.maps.InfoWindow();
    // display how many closest providers avialable 
    document.getElementById('email').innerHTML = " Disponibili:" + data.length + " Laboratori<br>";
    for (i = 0; i < data.length; i++) {
        var coordStr = data[i][2];
        var coords = coordStr.split(",");
        var pt = new google.maps.LatLng(parseFloat(coords[0]), parseFloat(coords[1]));
        bounds.extend(pt);
        marker = new google.maps.Marker({
            position: pt,
            map: map,
            icon: data[i][3],
            address: data[i][1],
            title: data[i][0],
            html: data[i][0] + "<br>" + data[i][1]
        });
        markers.push(marker);
        google.maps.event.addListener(marker, 'click', (function (marker, i) {
            return function () {
                infowindow.setContent(marker.html);
                infowindow.open(map, marker);
            }
        })
        (marker, i));
    }
    // this is important part , because we tell the map to put all markers inside the circle,
    // so all results will display and centered
    map.fitBounds(this.circle.getBounds());
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=&callback=initialize">
</script>