@extends('admin.template.base')
@section('content')

<div class="container-fluid">
	<!-- Header Page -->
	<div class="card">
	<div class="card-header">
		<h3>Detail Gedung
	</h3>
		<button type="button" class="btn btn-warning btn-fill btn-sm pull-right" onclick="history.back();"><i class="fa fa-chevron-circle-left"></i> Back</button>
	</div>
	</div>
	<!-- Isi Kodingan -->
	<div class="row">
		

		<div class="col-md-8">
			<div class="card shadow card-body pt-5 pb-0">
				<div class="form-validation">
					@foreach($list_gedung as $g)

					<div class="card-header">
						<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
							<ol class="carousel-indicators">
								<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
								@foreach($list_galeri->sortByDesc('id') as $p)
								<li data-target="#carouselExampleIndicators" data-slide-to="{{$loop->iteration}}"></li>
								@endforeach

							</ol>
							<div class="carousel-inner" >
								<div class="carousel-item active">
									<img src="{{url('public')}}/{{$gedung->foto}}" class="d-block" alt="..." style="width: 100%">
								</div>

								@foreach($list_galeri->sortByDesc('id') as $p)
								<div class="carousel-item">
									<img src="{{url('public')}}/{{$p->foto}}" class="d-block" style="width: 100%" alt="...">
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
				@endforeach
			</div>

		</div>

		<div class="col-md-4">
			<div class=" card shadow">
				<div class="card-header">

					Galeri <button type="button" class="btn btn-info btn-sm float-right" data-toggle="modal" data-target="#staticBackdrop{{$g->id}}">
						<i class="fa fa-upload"></i> Upload
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
									<h4>Upload Foto</h4>
									<form action="{{url('admin/gedung/galeri/upload')}}" method="post" enctype="multipart/form-data">
										@csrf
										<input type="text" hidden="" name="id_gedung" value="{{$g->id}}">
										<div class="form-group">
                <input type="file" name="foto" class="form-control mt-3 shadow" style="margin-bottom: 10px;" id="file1" onchange="return fileValidation()" accept="image/*" required> 
									</div>

									<div id="imagePreview1"></div>
										<button class="btn btn-info mt-3 btn-block"><i class="fa fa-upload"></i> Upload</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="">
					<div class="container">
						<div class="row mb-5">

							@foreach($list_galeri->sortByDesc('id') as $galeri)
							<div class="col-md-6 col-6">

								<img src="{{url('public')}}/{{$galeri->foto}}" width="100%" height="100px">
								@include('admin.utils.hapus', ['url' =>url('admin/gedung/galeri/delete', $galeri->id)])

								
							</div>	
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
  function fileValidation(){
    var fileInput = document.getElementById('file1');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
        //Image preview
        if (fileInput.files && fileInput.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
            document.getElementById('imagePreview1').innerHTML = '<img src="'+e.target.result+'" class="shadow" style="width:50%; border-radius:10px;"/>';
          };
          reader.readAsDataURL(fileInput.files[0]);
        }
      }
    </script>
@endsection