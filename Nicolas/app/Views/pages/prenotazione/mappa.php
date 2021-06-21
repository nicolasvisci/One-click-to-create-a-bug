<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
    crossorigin=""/>

<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
    crossorigin=""></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>

    <div id="map" style="height: 600px; width:800px; margin-left: 345px;"></div>
    <button id="click" name="click" type="submit" style="height:50px; width:120px; color:white; margin-left:690px;"> MOSTRA LABORATORI </button>


<script>

    loadMap('map');

    function loadMap (id) {
        var default_pos = [41.1122, 16.8547];
        map = L.map(id, { zoomControl: false});
        var tile_url = 'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw';
        var layer = L.tileLayer(tile_url, {
            maxZoom: 12,
		    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
			    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		    id: 'mapbox/streets-v11',
		    tileSize: 512,
		    zoomOffset: -1
        });

        map.addLayer(layer);
        map.setView(default_pos, 12);

        map.locate({setView: true, watch: true}) /* This will return map so you can do chaining */
            .on('locationfound', function(e){
                var lat = e.latitude;
                var lng = e.longitude;
                lat_lng = {latitude: lat, longitude: lng};
                var marker = L.marker([lat, lng]).bindPopup('sei qui');

                marker.on('mouseover', function() {
                    this.openPopup();
                });
                marker.on('mouseout', function() {
                    this.closePopup();
                });

                var circle = L.circle([lat, lng], {
                    weight: 1,
                    color: 'red',
                    fillColor: '#f03',
                    fillOpacity: 0.15,
                    radius: 30000
                });

                marker.addTo(map);
                circle.addTo(map);
            })
            
            .on('locationerror', function(e){
                console.log(e);
                alert("Location access denied.");
            });
    };

    $("#click").click(function(){

        $.ajax({
            url:"/mostraLaboratori",
            type: 'POST',
            data: lat_lng,
            dataType: "json",
            success: function(res){
                console.log(res);
                add_markers(res);
            }
        });
    });

    function mostraLaboratorio(info) {

        $.ajax({
            url:"/getData",
            type: 'POST',
            data: info,
            dataType: "json",
            success: function(res){
                window.location.href = "/prenotazione";
            }
        })
    }

    function add_markers(data){

        for (i = 0; i < data.length; i++) {
            var pos = data[i]['pos'].split(",");
            var lat = pos[0];
            var lng = pos[1];

            var nome_lab = data[i]['nome_lab'];
            var email = data[i]['email'];
            var numero_telefono = data[i]['numero_telefono'];

            var marker = L.marker([lat, lng]).bindPopup(nome_lab + "<br>email: " + email + "<br>numero: " + numero_telefono);

            marker.on('mouseover', function() {
                this.openPopup();
            });
            marker.on('mouseout', function() {
                this.closePopup();
            });

            marker.on('click', function() {
                info = {nome_lab: nome_lab, email: email, numero_telefono: numero_telefono};
                mostraLaboratorio(info);
            });

            marker.addTo(map);
        }
    }

    
    

</script>