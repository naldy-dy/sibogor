@extends('section.base')
@section('content')
<section id="featured-services" class="featured-services mb-3 mt-5">
	<div class="container-fluid mt-5">
		<div class="row">

			<div class="col-md-12">
				<div class="card border-0">
					<div class="card-body">
						<h1>{{strtoupper($gedung->nama)}}</h1>
						<div id="map" class="shadow" style="height: 80vh; border-radius: 10px;"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>



<script>

	var peta1 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
		'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
		'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/streets-v11'
	});

	var peta2 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
		'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
		'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/satellite-v9'
	});


	var peta3 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
	});

	var peta4 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
		'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
		'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/dark-v10'
	});

// 2. Pembuatan Layer
// layer kategori kecamatan


// 3. Penentuan zoom,coor, tipe maps dan layer





navigator.geolocation.getCurrentPosition(function(location) {
  var latlng = new L.LatLng(location.coords.latitude, location.coords.longitude);

  var map = L.map('map', {
	center: latlng,
	zoom: 13,
	layers: [peta1],
});

// 4. basemaps
var baseMaps = {
	"Grayscale": peta1,
	"Satellite": peta2,
	"Streets": peta3,
	"Dark": peta4,
};


L.control.layers(baseMaps ).addTo(map);
  L.Routing.control({
  waypoints: [

    L.latLng(latlng),
    L.latLng([<?= $gedung->posisi ?>]),

  ],
    addWaypoints: false
    
}).addTo(map);

setInterval(location, 1000);

});




</script>
@endsection