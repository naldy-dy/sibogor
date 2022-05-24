@extends('admin.template.base')
@section('content')


<div class="container-fluid">
	<!-- Header Page -->
	<div class="card">
		<div class="card-header shadow d-sm-flex d-block pb-0 border-0">
			<div class="mr-auto pr-3 mb-sm-0 mb-3">
				<h4 class="text-black fs-30">Edit Gedung</h4>
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
					<div class="row">
						<div class="col-md-6">
							<div id="map" style="width: 100%; height: 400px;"></div>
						</div>
						<div class="col-md-6">
							<form class="form-valide" action="{{url('admin/gedung/update',$gedung)}}" method="post" enctype="multipart/form-data">
								@csrf
								@method("PUT")
								<div class="form-group">
									<input type="text" name="nama" required="" class="form-control shadow" placeholder="Nama Gedung" value="{{$gedung->nama}}">
								</div>
								<div class="form-group">
									<select class="form-control shadow" name="kategori" required="">
										@foreach($list_gedung as $g)
										<option selected hidden value="{{$gedung->id_kategori}}">{{ucwords($g->kategori)}}</option>
										@endforeach
										@foreach($list_kategori as $k)
										<option value="{{$k->id}}">{{ucwords($k->kategori)}}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group">
									<input type="text" name="harga" required="" class="form-control shadow" value="{{$gedung->harga}}" placeholder="Harga Boking/Jam">
								</div>
								<div class="form-group">
									<textarea class="form-control shadow" required="" name="deskripsi" placeholder="Deskripsi Gedung"  rows="4">{{$gedung->deskripsi}}</textarea>
								</div>

								<div class="form-group">
									<select class="form-control shadow" name="id_kecamatan" required="">
										@foreach($list_gedung as $g)
										<option selected hidden value="{{$gedung->id_kecamatan}}">{{ucwords($g->kecamatan)}}</option>
										@endforeach
										@foreach($list_kecamatan as $a)
										<option value="{{$a->id}}">{{ucwords($a->kecamatan)}}</option>
										@endforeach
									</select>
								</div>

								<div class="form-group">
									<textarea class="form-control shadow" name="alamat" placeholder="Alamat Gedung" rows="4" required="">{{$gedung->alamat}}</textarea>
								</div>
								<div class="form-group">
									<input type="text" name="posisi" class="form-control shadow"  required="" value="{{$gedung->posisi}}" placeholder="Drag Marker Cari Posisi Anda Di map Disamping" id="posisi">
								</div>
								<div class="form-group">
									<input type="file" name="foto" class="form-control shadow" placeholder="Nama Gedung" accept="image/*" >
								</div>
								<button class="btn btn-primary btn-block"><i class="fa fa-save"></i> Simpan</button>

							</form>
						</div>
					</div>
					
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
		center: [-1.8358712300287032,109.97504462294081],
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
var curlocation = [-1.8358712300287032,109.97504462294081];
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