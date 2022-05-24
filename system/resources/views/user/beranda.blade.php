@extends('user.template.base')
@section('content')

<div class="container-fluid">
	<div class="card shadow">
		<div class="card-body">
			
			<div class="">
				<label>Maps</label>
				<div id="map" style="width: 100%; height: 450px;"></div>

			</div>

		</div>

	</div>

	<div class="card shadow">
			@foreach($list_gedung->sortByDesc('id') as $g)
		<div class="card-body mt-3 pt-3 pb-3">
			<div class="media border-bottom mb-3 pb-3 d-lg-flex d-block menu-list">
				<a href="ecom-product-detail.html">
					<div class="row">
						<div class="col-md-6">
							<img class="" src="{{url("public/$g->foto")}}" alt=" " width="100%"></a>
						</div>
						<div class="col-md-6">
							<div class="media-body col-lg-12 pl-0">
								<h6 class="fs-18 font-w600"><a href="ecom-product-detail.html" class="text-black">{{ucwords($g->nama)}}</a></h6>
								<p class="fs-14">{{ucwords($g->deskripsi)}}</p>
								<p class="fs-14 text-black font-w500">Harga : Rp. {{number_format($g->harga)}}</p>
								<p class="fs-14 text-black font-w500">Alamat : {{ucwords($g->alamat)}}</p>
								<button class="btn btn-primary btn-sm" style="width: 120px">{{ucwords($g->kategori)}}</button>
								<button class="btn btn-primary btn-sm" style="width: 120px"><i class="fa fa"></i>{{ucwords($g->kecamatan)}}</button>

							</div>
						</div>	
					</di>
				</div>
			</div>
		</div>
		@endforeach

		
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
	center: [-1.8341771,109.9677811],
	zoom: 13,
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
var informasi = '<table class="table" width="550px"><tr><td colspan="4"><img src="{{url('public')}}/{{$p->foto}}" height="100px" width="100%"></td></tr><tr><td>Nama</td><td>: {{ucwords($p->nama)}}</td></tr><tr><td>Kategori</td><td>: {{ucwords($p->kategori)}}</td></tr><tr><td>Harga/Jam</td><td>: Rp.{{number_format($p->harga)}}</td></tr><tr><td colspan="2"><a href="{{url('detail')}}/{{$p->idg}}" class="btn btn-primary btn-sm btn-block" style="color:#ffffff">Detail</a><td></tr></table>'

	L.marker([<?= $p->posisi ?>],{icon : icongedung}).addTo(map)
	.bindPopup(informasi)
@endforeach



</script>

@endsection