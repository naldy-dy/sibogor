<!DOCTYPE html>
<html lang="en">
<head>
	@include('admin.section.assets')
</head>
<body>


	<div class="container-fluid">
		<!-- Header Page -->
		<div class="card  mt-5 bg-primary">
			<div class="card-body ">
				<div class="text-center" >

					<h2 style="color: #fff !important">Daftar Gedung</h2>
				</div>
			</div>
		</div>
		<!-- Isi Kodingan -->
		<div class="card shadow">
			<div class=" card-body pt-2 pb-0">
				<div class="form-validation">
					<div class="card-body">
						<p>Masukan data gedung anda dibawah, pastikan form telah diisi semua!!!</p>
						<div class="row">

							<div class="col-md-6">
								<form class="form-valide" action="{{url('admin')}}/gedung/create" method="post" enctype="multipart/form-data">
									@csrf
									<div class="form-group">
										<input type="text" name="nama" required="" class="form-control shadow" placeholder="Nama Gedung">
									</div>
									<div class="form-group">
										<select class="form-control shadow" name="kategori" required="">
											<option selected disabled hidden> -- Pilih Kategori Gedung --</option>
											@foreach($list_kategori as $k)
											<option value="{{$k->id}}">{{ucwords($k->kategori)}}</option>
											@endforeach
										</select>
									</div>
									<div class="form-group">
										<input type="text" name="harga" required="" class="form-control shadow" placeholder="Harga Boking/Jam">
									</div>
									<div class="form-group">
										<textarea class="form-control shadow" required="" name="deskripsi" placeholder="Deskripsi Gedung"  rows="4"></textarea>
									</div>

									<div class="form-group">
										<select class="form-control shadow" name="kecamatan" required="" rea>
											@foreach($list_kecamatan as $a)
											<option value="{{$a->id}}">{{ucwords($a->kecamatan)}}</option>
											@endforeach
										</select>
									</div>

									<div class="form-group">
										<textarea class="form-control shadow" name="alamat" placeholder="Alamat Gedung" rows="4" required=""></textarea>
									</div>
									<div class="form-group">
										<input type="text" name="posisi" class="form-control shadow"  required="" placeholder="Drag Marker Cari Posisi Anda Di map Disamping" id="posisi">
									</div>


								</div>

								<div class="col-md-6">
									<div class="custom-file">
										<input type="file" name="foto" class="custom-file-input" id="file" onchange="return fileValidation()" accept="image/*">
										<label class="custom-file-label">Pilih Gambar</label>
									</div>
									<p>Preview Gambar:</p>
									<center>
										<div id="imagePreview"></div>
									</center>
									<p>Titik lokasi gedung</p>
									<div id="map" class="mt-3" style="width: 100%; height: 50vh;"></div>
								</div>
								<button class="btn btn-primary mt-3 btn-block"><i class="fa fa-save"></i> Simpan</button>
							</form>
						</div>

					</div>

				</div>

			</div>
		</div>
	</div>

	<script>
		function fileValidation(){
			var fileInput = document.getElementById('file');
			var filePath = fileInput.value;
			var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
			if(!allowedExtensions.exec(filePath)){
				alert('Please upload file having extensions .jpeg/.jpg/.png/.gif only.');
				fileInput.value = '';
				return false;
			}else{
        //Image preview
        if (fileInput.files && fileInput.files[0]) {
        	var reader = new FileReader();
        	reader.onload = function(e) {
        		document.getElementById('imagePreview').innerHTML = '<img src="'+e.target.result+'" style="width:70%"/>';
        	};
        	reader.readAsDataURL(fileInput.files[0]);
        }
    }
}
</script>

<script>

	var peta2 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
		'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
		'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/satellite-v9'
	});

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
	var lng = event.latlng.lng;

	if(!marker)
	{
		marker = L.marker(event.latlng).addTo(map);
	}else{
		marker.setLatLng(event.latlng);
	}
	posisi.value = lat + "," + lng;
});


</script>

</body>
</html>


