@extends('user.template.base')
@section('content')

<div class="container-fluid">
	<div class="card mt-3">
		<div class="card-header d-sm-flex bg-primary d-block pb-0 border-0">
			<div class="mr-auto pr-3 mb-sm-0 mb-3">
				<h3 style="color: #ffffff" class="fs-30">{{ucwords($gedung->nama)}}</h3>
			</div>
			<a href="{{url('form-boking')}}/{{$gedung->id}}" class="btn shadow rounded btn-warning mb-3">Boking Now Rp. {{$gedung->harga}}/Jam </a>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-md-6">
					<div class="">
						<div class="row">

							<div class="col-md-12 mt-3">
								<div class="card-header bg-primary">
									<div class="card-title">
										<h3  style="color: #ffffff; text-align: center;" class="fs-14">Detail Gedung</h3>
										<div class="col-md-12">

										</div>
									</div>
								</div>
								<div class="card-body shadow">
									<img style="border-radius :4px;" src="{{url('public')}}/{{$gedung->foto}}" width="100%">
									<table class="table fs-12 table-hover" border="0">
										<tr>
											<th>Nama Gedung</th>
											<th>:</th>
											<td> {{ucwords($gedung->nama)}}</td>
										</tr>
										<tr>
											<th>Kategori</th>
											<th>:</th>
											<td>{{$gedung->kategori}}</td>
										</tr>
										<tr>
											<th>Harga</th>
											<th>:</th>
											<td>{{$gedung->harga}}/Jam</td>
										</tr>
										<tr>
											<th>Deskripsi</th>
											<td colspan="2">{{$gedung->deskripsi}}</td>
										</tr>
										<tr>
											<th>Alamat</th>
											<td colspan="2">{{ucwords($gedung->alamat)}}</td>
										</tr>
									</table>
									<div class="col-md-12">
										<a href="{{url('form-boking')}}/{{$gedung->id}}" class="btn btn-warning btn-block shadow"> Boking Now</a>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-6">
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-12">
								<div id="map" style="width: 100%; height: 450px;"></div>		
							</div>
							<div class="col-md-12">
								<div class="row">
									@foreach($list_galeri as $g)
									<div class="col-md-6">
										<img src="{{url('public')}}/$g->galeri">
									</div>
									@endforeach
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

<script type="text/javascript">
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
@foreach($list_kecamatan as $data)
var data{{$data->id}} = L.layerGroup();
@endforeach

// 3. Penentuan zoom,coor, tipe maps dan layer
var map = L.map('map', {
	center: [{{$gedung->posisi}}],
	zoom: 16,
	layers: [peta2, 

	@foreach($list_kecamatan as $data)
	data{{$data->id}},
	@endforeach
	]
});

// 4. basemaps
var baseMaps = {
	"Grayscale": peta1,
	"Satellite": peta2,
	"Streets": peta3,
	"Dark": peta4,
};

// 5. Layer Kecamatan
var overLayer = {
	@foreach($list_kecamatan as $data)
	"{{ucwords($data->kecamatan)}}" : data{{$data->id}},

	@endforeach
};
L.control.layers(baseMaps, overLayer ).addTo(map);


var icongedung = L.icon({
	iconUrl : "{{url('public')}}/{{$gedung->icon}}",
	iconSize : [40, 55],
});
var informasi = '<table class="table" width="550px"><tr><td colspan="4"><img src="{{url('public')}}/{{$gedung->foto}}" height="100px" width="100%"></td></tr><tr><td>Nama</td><td>: {{ucwords($gedung->nama)}}</td></tr><tr><td>Kategori</td><td>: {{ucwords($gedung->kategori)}}</td></tr><tr><td>Harga/Jam</td><td>: Rp.{{number_format($gedung->harga)}}</td></tr><tr><td colspan="2"><td></tr></table>'

L.marker([<?= $gedung->posisi ?>],{icon : icongedung}).addTo(map)
.bindPopup(informasi) = ''


</script>
@endsection