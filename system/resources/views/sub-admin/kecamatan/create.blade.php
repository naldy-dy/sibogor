@extends('sub-admin.template.base')
@section('content')

<div class="container-fluid">
	<div class="card shadow">
		<div class="card-header d-sm-flex d-block pb-0 border-0">
			<div class="mr-auto pr-3 mb-sm-0 mb-3">
				<h4 class="text-black fs-20">Buat Data Kecamatan</h4>
			</div>
			<button type="button" class="btn btn-warning btn-fill btn-sm pull-right" onclick="history.back();"><i class="fa fa-chevron-circle-left"></i> Back</button>
		</div>
		<div class="card-body">
			
			<form action="{{url('sub-admin')}}/kecamatan/create" method="post">
				@csrf
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<p class="mb-1">Kecamatan</p>
							<input type="text" name="kecamatan" class="form-control shadow" required="" placeholder="Nama Kecamatan">
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<div class="example">
								<p class="mb-1">Warna</p>
								<input type="text" class="as_colorpicker form-control shadow" name="warna" value="#7ab2fa" readonly="">
							</div>
						</div>
					</div>
				</div>
				<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<p class="mb-1">GeoJson</p>
						<textarea class="form-control shadow" name="geojson" placeholder="GeoJson Kecamatan" required=""  rows="7"></textarea>
					</div>
				</div>

			</div>
			</div>
			
			<button class="btn btn-primary float-right"><i class="fa fa-save"></i> Simpan</button>



		</form>

	</div>

</div>

@endsection
