@extends('section.base')
@section('content')    
<!-- End Navbar -->

<div class="container pt-6">
	<div class=" mt-6">
		<div class="card-header pt-3 bg-white shadow d-sm-flex d-block pb-0 border-0">
			<div class="mr-auto pr-3 mb-sm-0 mb-3">
				<h3 style="color: blue;font-weight: 600" class="fs-30">Profil Admin Gedung</h3>
			</div>
				
			
</div>
		<div class="card card-body mt-3">
			<div class="row">
				<div class="col-md-3">
					<img src="{{url('public')}}/{{$pemilik->foto}}" width="100%" alt="">
				</div>

				<div class="col-md-9">
					<table class="table table-hover">
						<tr class="bg-primary">
							<td colspan="2"><b style="color: #ffffff">Profil Admin Gedung</b></td>
						</tr>
						<tr>
							<th>Nama Admin</th>
							<td>: {{ucwords($pemilik->nama)}}</td>
						</tr>
						<tr>
							<th>Email</th>
							<td>: {{ucwords($pemilik->email)}}</td>
						</tr>
						<tr>
							<th>No Hp</th>
							<td>: {{ucwords($pemilik->notlp)}}</td>
						</tr>
						<tr>
							<th>Bergabung Sejak</th>
							<td>: {{ucwords($pemilik->created_at)}}</td>
						</tr>
						<tr>
							<th>Kontak</th>
							<td>: <a href="https://wa.me/62{{$pemilik->notlp}}" target="_blank" class="btn btn-success"><i class="fa fa-whatsapp"></i> Whatsapp</a>
							<a href="mailto:{{$pemilik->email}}?subject=SIBOGOR&body=" class="btn btn-info"><i class="fa fa-envelope-o"></i> Email</a></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection