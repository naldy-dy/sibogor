@extends('admin.template.base')
@section('content')

<div class="container-fluid">
	<div class="card shadow">
		<div class="card-body">
			<div class="">
				<h4 class="text-black fs-20">Galeri Gedung
					<button type="button" class="btn btn-primary btn-sm float-right" style="float: right;" data-toggle="modal" data-target="#exampleModal">
						<i class="fa fa-plus"></i> Upload Galeri
					</button>
				</h4>



				<!-- Modal -->
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="{{url('admin')}}/galeri/create" method="post" enctype="multipart/form-data">
									@csrf
									@foreach($list_gedung as $g)
									<input type="" value="{{$g->id}}" name="id_gedung">
									@endforeach

									<div class="form-group">
										<input type="file" name="foto" class="form-control mt-3 shadow" style="margin-bottom: 10px;" id="file1" onchange="return fileValidation()" accept="image/*" required> 
									</div>

									<div id="imagePreview1"></div>
									<button class="btn btn-info float-right"><i class="fa fa-upload"></i> Upload</button>

								</form>
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>


	<div class="card mt-3 shadow">
		<div class="card-body">

			@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
			<div class="row">
				@foreach($list_galeri->sortByDesc('id') as $galeri)
				<div class="col-md-4">
					<div class="shadow m-1">
						<img src="{{url('public')}}/{{$galeri->foto}}" width="100%" height="200px">
					</div>
					@include('admin.utils.hapus', ['url' =>url('admin/galeri', $galeri->id)])
				</div>
				@endforeach
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

