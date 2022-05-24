@extends('admin.template.base')
@section('content')

<div class="container-fluid">
	<!-- Header Page -->
	<div class="card">
		<div class="card-header shadow d-sm-flex d-block pb-0 border-0">
			<div class="mr-auto pr-3 mb-sm-0 mb-3">
				<h4 class="text-black fs-30">Detail Gedung</h4>
			</div>
			<div class="dropdown mb-3 show">
				<button type="button" class="btn btn-warning btn-fill btn-sm pull-right" onclick="history.back();"><i class="fa fa-chevron-circle-left"></i> Back</button>
			</div>
		</div>
	</div>
	<!-- Isi Kodingan -->
	<div class="">
		<div class="card card-body pt-5 pb-0">
			<div class="form-validation">
				@foreach($list_gedung as $g)
				<div class="row">
					<div class=" pl-2 col-md-6">
						<div class="card-header">
							<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
								<ol class="carousel-indicators">
									<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
									@foreach($list_galeri->sortByDesc('id')->take(4) as $p)
									<li data-target="#carouselExampleIndicators" data-slide-to="{{$loop->iteration}}"></li>
									@endforeach

								</ol>
								<div class="carousel-inner">
									<div class="carousel-item active">
										<img src="{{url('public')}}/{{$gedung->foto}}" class="d-block w-100" alt="...">
									</div>

									@foreach($list_galeri->sortByDesc('id')->take(4) as $p)
									<div class="carousel-item">
										<img src="{{url('public')}}/{{$p->foto}}" class="d-block w-100" alt="...">
									</div>
									@endforeach


								</div>
								<button class="carousel-control-prev" style="border: 0" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
									<span class="carousel-control-prev-icon" aria-hidden="true"></span>
									<span class="sr-only">Previous</span>
								</button>
								<button class="carousel-control-next" style="border: 0px" type="button" data-target="#carouselExampleIndicators" data-slide="next">
									<span class="carousel-control-next-icon" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								</button>
							</div>
						</div>
						<div class="card-body">
							<h3>{{ucwords($g->nama)}}</h3>
							Kategori Gedung : {{ucwords($g->kategori)}} <br>
							Harga Boking : Rp. {{number_format($g->harga)}}/Jam <br>
							Posisi Lat + Lng = {{$g->posisi}}<br>
							Alamat : {{ucwords($g->alamat)}} <br>
							<hr>
							Deskripsi : <br> {!!nl2br($g->deskripsi)!!}
						</div>
					</div>

					<div class="col-md-6 card shadow">
						<div class="card-header">
							Galeri Gedung <button type="button" class="btn btn-info btn-sm float-right" data-toggle="modal" data-target="#staticBackdrop{{$g->id}}">
								<i class="fa fa-upload"></i> Upload Gambar
							</button>
							<div class="modal fade" id="staticBackdrop{{$g->id}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="staticBackdropLabel">Galeri</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<div class="card">
												<div class="card-body shadow"><h4>Upload Foto</h4>
													<form action="{{url('admin/gedung/galeri/upload')}}" method="post" enctype="multipart/form-data">
														@csrf
														<input type="text" hidden="" name="id_gedung" value="{{$g->id}}">
														<input type="file" class="form-control" name="foto" accept="image/*" required="">
														<button class="btn btn-info mt-3 btn-block"><i class="fa fa-upload"></i> Upload</button>
													</form>
												</div>
											</div>	
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card-body">
							<div class="row">
								@foreach($list_galeri->sortByDesc('id') as $galeri)
								<div class="col-md-6">
									<div class="card-body">
										<img src="{{url('public')}}/{{$galeri->foto}}" width="100%">
										@include('admin.utils.hapus', ['url' =>url('admin/gedung/galeri/delete', $galeri->id)])
									</div>
								</div>	
								@endforeach
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>

		</div>
	</div>
</div>

@endsection