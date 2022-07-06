@extends('section.base')
@section('content')    
<!-- End Navbar -->
<!-- style="background-image: url('{{url('public')}}/assets-user/img/wall.jpg'); background-size:cover;" -->
<div class="page-header min-vh-75 mt-3" >
	<div class="container-fluid pt-6">
		<div class="card-body">
			<div class="row">
				<div class="col-md-9 mb-3">
					<div class="row">
						<div class="col-md-9">
							<form action="{{url('cari')}}" method="post">
								@csrf
								<div class="input-group">
									<input type="text" name="nama" value="{{ old('nama')}}" class="form-control form-control-sm blur shadow" placeholder="Cari Gedung ..">
									<div class="input-group-append">
										<button class="btn btn-info" style="background-color: #1BC4CA">Cari</button>
									</div>
								</div>
							</form>
						</div>
						<div class="col-md-3 ">
							<button type="button" style="background-color: #1BC4CA" class="btn btn-info btn-block" data-toggle="modal" data-target="#filter"><i class="fa fa-filter"></i> Filter</button>

							<!-- Modal -->
							<div class="modal fade border-0" id="filter" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="staticBackdropLabel">Filter Gedung</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<div class="card mb-3">
												<div class="card-header">
													<h4>FIlter Harga</h4>
												</div>
												<div class="card-body shadow">
											<form action="{{url('filter')}}" method="post">
												@csrf
												<div class="form-group">
													<input type="number" name="min" required="" min="1000" class="shadow form-control" placeholder="Harga Min">
												</div>
												<div class="form-group">
													<input type="number" name="max" required="" class="shadow form-control" placeholder="Harga Max" >
												</div>

												<button class="btn btn-info btn-block"><i class="fa fa-filter"></i> Filter Harga</button>
											</form>
										</div>
									</div>

											<div class="card">
												<div class="card-header">
													<h4>FIlter Kategori</h4>
												</div>
												<div class="card-body shadow">
													<form action="{{url('filter-kategori')}}" method="post">
												@csrf
												@foreach($list_kategori as $k)
												<div class="form-check form-check-inline mb-3">
													<input class="form-check-input" type="radio" name="kategori" value="{{$k->id}}" required="">
													<label class="form-check-label">{{strtoupper($k->kategori)}}</label>
												</div>
												@endforeach

												<button class="btn btn-info btn-block"><i class="fa fa-filter"></i> Filter Kategori</button>
											</form>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="shadow" id="map" style="width: 100%; height: 400px;border-radius: 10px;"></div>
				</div>
				<div class="col-md-3 ">
					<div class="card animated fadeInDown shadow">
						<div class="card-header" style="background-color: #1BC4CA; !important">
							<h2 style="color:#ffffff"> Gedung Lainnya</h2>
						</div>
						<div class="card-body">
							<div class="table-responsive">
							<table class="table blur fs-12 ">
								@foreach($list_rekomendasi as $g)
								<tr class="blur">
									<td>
										<img src="{{url('public')}}/{{$g->foto}}" width="70px" height="50px" alt="">
									</td>
									
									<td><a href="{{url('detail')}}/{{$g->idg}}">
										<b>{{ucwords($g->nama)}}</b> <br>
										Rp. {{number_format($g->harga)}}/Jam <br>
									</a>
								</td>
							</tr>
							@endforeach
						</table>				
					</div>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<!-- 1. Template Maps -->

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
@foreach($list_kecamatan as $data)
var data{{$data->id}} = L.layerGroup();
@endforeach

// 3. Penentuan zoom,coor, tipe maps dan layer
var map = L.map('map', {
	center: [-1.8358712300287032,109.97504462294081],
	zoom: 13,
	layers: [peta1, 

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

// Layer maps
// 5. ambil data geojson kecamatan
@foreach($list_kecamatan as $data)
L.geoJSON(<?= $data->geojson ?>,{
	style :{
		color : 'white',
		fillColor : '{{$data->warna}}',
		fillOpacity : 0.5,
	}
}).addTo(data{{$data->id}});
@endforeach

// Nampilkan data sekolah
@foreach($list_gedung as $p)
var icongedung = L.icon({
	iconUrl : "{{url('public')}}/{{$p->ic}}",
	iconSize : [40, 55],
});
var informasi = '<table class="table" width="550px"><tr><td colspan="4"><img src="{{url('public')}}/{{$p->foto}}" height="100px" width="100%"></td></tr><tr><td>Nama</td><td>: {{ucwords($p->nama)}}</td></tr><tr><td>Kategori</td><td>: {{ucwords($p->kategori)}}</td></tr><tr><td>Harga/Jam</td><td>: Rp.{{number_format($p->harga)}}</td></tr><tr><td colspan="2"><a href="{{url('detail')}}/{{$p->idg}}" class="btn btn-info btn-sm btn-block" style="color:#ffffff">Detail</a>  <a href="{{url('gedung')}}/{{$p->idg}}/route" class="btn btn-success btn-sm btn-block" style="color:#ffffff">Route</a><td></tr></table>'

L.marker([<?= $p->posisi ?>],{icon : icongedung}).addTo(map)
.bindPopup(informasi)
@endforeach



</script>

@endsection