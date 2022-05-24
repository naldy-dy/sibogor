@extends('sub-admin.template.base')
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
				<form class="form-valide" action="{{url('sub-admin/gedung/update',$gedung->id)}}" method="post" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<div class="row">
						<div class="col-xl-12 col-md-12">
							<div class="form-group row">
								<label class="col-lg-4 col-form-label" for="val-username">Nama Gedung
									<span class="text-danger">*</span>
								</label>
								<div class="col-lg-8">
									<input type="text" class="form-control" id="val-username" name="nama" placeholder="Nama Gedung" required="" value="{{$gedung->nama}}">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-4 col-form-label" for="val-skill">Kategori GOR
									<span class="text-danger">*</span>
								</label>
								<div class="col-lg-8">
									<select class="form-control default-select" id="val-skill" name="kategori">
										<option value="">Pilih Kategori</option>
										<option >Futsal</option>
										<option>Badminton</option>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-4 col-form-label" for="val-username">Harga/jam
									<span class="text-danger">*</span>
								</label>
								<div class="col-lg-8">
									<input type="number" class="form-control" id="val-username" name="harga" value="{{$gedung->harga}}" placeholder="Harga Boking Gedung" required="">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-4 col-form-label" for="val-username">Gambar
									<span class="text-danger">*</span>
								</label>
								<div class="col-lg-8">
									<input type="file" class="form-control" name="foto" placeholder="Nama Gedung" accept="image/*">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-4 col-form-label" for="val-suggestions">Alamat Lengkap <span
									class="text-danger">*</span>
								</label>
								<div class="col-lg-8">
									<textarea class="form-control" id="val-suggestions" name="alamat" rows="5" placeholder="Alamat Lengkap">{{ucwords($gedung->alamat)}}
									</textarea>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-4 col-form-label" for="val-username">Latitude
									<span class="text-danger">*</span>
								</label>
								<div class="col-lg-8">
									<input type="text" class="form-control" id="val-username" value="{{$gedung->latitude}}" name="latitude" placeholder="Latitude" required="">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-4 col-form-label" for="val-username">Longitude
									<span class="text-danger">*</span>
								</label>
								<div class="col-lg-8">
									<input type="text" class="form-control" id="val-username" value="{{$gedung->longitude}}" name="longitude" placeholder="Longitude" required="">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-4 col-form-label" for="val-suggestions">Deskripsi <span
									class="text-danger">*</span>
								</label>
								<div class="col-lg-8">
									<textarea class="form-control" id="val-suggestions" name="deskripsi" rows="5" placeholder="Deskripsikan Gedung Anda">{{$gedung->deskripsi}}</textarea>
								</div>
							</div>
							<button class="btn btn-primary float-right mb-3"><i class="fa fa-save"></i> SIMPAN</button>
						</div>
					</div>
				</form>
			</div>

		</div>
	</div>
</div>

@endsection