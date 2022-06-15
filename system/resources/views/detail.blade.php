@extends('section.base')
@section('content')    
<!-- End Navbar -->

<div class="container-fluid pt-6">
	<div class=" mt-6">
		<div class="card-header pt-3 bg-white shadow d-sm-flex d-block pb-0 border-0">
			<div class="mr-auto pr-3 mb-sm-0 mb-3">
				<h3 style="color: #E0BE1E;font-weight: 600" class="fs-30">{{ucwords($gedung->nama)}}</h3>
			</div>
			
			<a href="{{url('form-boking')}}/{{$gedung->id}}" class="btn shadow rounded btn-primary mb-3">Boking Now Rp. {{$gedung->harga}}/Jam </a>
		</div>
	</div>

</div>

<div class="card-body border-0">
	<div class="row">
		<div class="col-md-8">
			<div class="row">
				<div class="col-md-12 mt-3">
					<div class="card">
						<div class="card-header bg-info shadow">
							<div class="card-title">
								<h3  style="color: #ffffff; text-align: center;" class="fs-20">Rp. {{number_format($gedung->harga)}}/Jam</h3>

							</div>
						</div>
						<div class="card-body shadow shadow-lg">
							<img style="border-radius :4px;"  width="100%">
							<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
								<ol class="carousel-indicators">
									<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
									@foreach($list_galeri->sortByDesc('id') as $g)
									<li data-target="#carouselExampleIndicators" data-slide-to="{{$loop->iteration}}"></li>
									@endforeach
									
								</ol>
								<div class="carousel-inner">
									<div class="carousel-item active">
										<img src="{{url('public')}}/{{$gedung->foto}}" class="d-block w-100" alt="...">
									</div>

									@foreach($list_galeri->sortByDesc('id') as $g)
									<div class="carousel-item">
										<img src="{{url('public')}}/{{$g->foto}}" class="d-block w-100" alt="...">
									</div>
									@endforeach


								</div>
								<button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
									<span class="carousel-control-prev-icon" aria-hidden="true"></span>
									<span class="sr-only">Previous</span>
								</button>
								<button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
									<span class="carousel-control-next-icon" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								</button>
							</div>
							<h3 class="pt-3">{{ucwords($gedung->nama)}}</h3>
							<a href="{{url('pemilik',$gedung->id_admin)}}"  class="btn btn-info fs-16"><i class="fa fa-user fa-lg"></i> Profil Admin</a>
							<br>
							<strong>Harga Boking</strong>
							<p>Rp. {{number_format($gedung->harga)}}/Jam</p>



							<strong>Deskripsi :</strong>
							<p>{!!nl2br($gedung->deskripsi)!!}</p>
							<strong>Alamat Gedung:</strong>
							<p>{{$gedung->alamat}}</p>
							<div class="col-md-12">
								<a href="{{url('form-boking')}}/{{$gedung->id}}" class="btn btn-info btn-block shadow"> Boking Now</a>
							</div>
						</div> 
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-4">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12 mt-3">
						<div id="map" style="width: 100%; height: 450px;"></div>		
					</div>
					<div class="col-md-12 pt-5">
						<div class="card">
							<div class="card-header bg-info">
								<h2 style="color: #ffffff">Galeri GOR</h2>
							</div>

							<div class="card-body">
								<div class="row">

									@foreach($list_galeri as $g)
									<div class="col-md-6">
										<img src="{{url('public')}}/{{$g->foto}}" class="pt-3" width="100%">
									</div>
									@endforeach
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>

		</div>

	<button type="button" class="btn btn-warning btn-block pull-right" onclick="history.back();"><i class="fa fa-chevron-circle-left"></i>  Kembali</button>
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
	iconSize : [60, 60],
});
var informasi = '<table class="table" width="550px"><tr><td colspan="4"><img src="{{url('public')}}/{{$gedung->foto}}" height="100px" width="100%"></td></tr><tr><td>Nama</td><td>: {{ucwords($gedung->nama)}}</td></tr><tr><td>Harga/Jam</td><td>: Rp.{{number_format($gedung->harga)}}</td></tr><tr><td colspan="2"><td></tr></table>'

L.marker([<?= $gedung->posisi ?>],{icongedung}).addTo(map)
.bindPopup(informasi) = ''


</script>

@endsection