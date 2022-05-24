@extends('admin.template.base')
@section('content')


<div class="container-fluid">
	<!-- Header Page -->
	<div class="card">
		<div class="card-header shadow d-sm-flex d-block pb-0 border-0">
			<div class="mr-auto pr-3 mb-sm-0 mb-3">
				<h4 class="text-black fs-30">Tambah Profil Gedung</h4>
			</div>
			<div class="dropdown mb-3 show">
				<button type="button" class="btn btn-warning btn-fill btn-sm pull-right" onclick="history.back();"><i class="fa fa-chevron-circle-left"></i> Back</button>
			</div>
		</div>
	</div>
	<!-- Isi Kodingan -->
	<div class="card">
		<div class="shadow card-body pt-5 pb-0">
			<div class="form-validation">
				<div class="card-body">
				<form class="form-valide" action="{{url('admin')}}/galeri/create" method="post" enctype="multipart/form-data">
								@csrf
								<div class="form-group">
									<label>Foto</label>
									@foreach($list_gedung as $g)
									{{ucwords($g->nama)}}
									@endforeach
								<div class="form-group">
									<label>Foto</label>
									<input type="file" name="galeri" class="form-control shadow" required="" accept="image/*">
								</div>
								<button class="btn btn-primary btn-block"><i class="fa fa-save"></i> Simpan</button>

							</form>
					

				</div>



			</div>

		</div>
	</div>
</div>

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

	var map = L.map('map', {
		center: [-1.8341771,109.9677811],
		zoom: 13,
		layers: [peta2],
	});



	var baseMaps = {
	"Grayscale": peta1,
	"Satellite": peta2,
	"Streets": peta3,
	"Dark": peta4,
};

L.control.layers(baseMaps).addTo(map);

// getcoordinat
var curlocation = [-1.8341771,109.9677811];
map.attributionControl.setPrefix(false);
var marker = new L.marker(curlocation,{
	draggable : 'true',
});

// get coordinat marker
map.addLayer(marker);
marker.on('dragend', function(event){

	var position = marker.getLatLng();
	marker.setLatLng(position, {
		draggable : 'true',
	}).bindPopup(position).update();
	$("#posisi").val(position.lat + "," + position.lng).keyup();
});

// ambil coorrdinat saat di click
var posisi = document.querySelector("[name=posisi]");
map.on("click", function(event){
	var lat = event.latlng.lat;
	var lng = event.latlng.lat;

	if(!marker)
	{
		marker = L.marker(event.latlng).addTo(map);
	}else{
		marker.setLatLng(event.latlng);
	}
	posisi.value = lat + "," + lng;
});


</script>

@endsection