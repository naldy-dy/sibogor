@extends('admin.template.base')
@section('content')
<style>
	.container_{margin:10px;padding:5px;border:solid 1px #eee;}
	.image_upload > input{display:none;}
	input[type=text]{width:220px;height:auto;}
</style>
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="profile card card-body px-3 pt-3 pb-0">
				<div class="profile-head">
					<div class="photo-content">
						<div class="cover-photo"></div>
					</div>
					<div class="profile-info">
						<div class="profile-photo">
							<img src="{{url('public')}}/{{$user->foto}}" class="img-fluid rounded-circle" alt="">
						</div>
						<div class="profile-details">
							<div class="profile-name col-md-4 px-3 pt-2">
								<h4 class="text-primary mb-0">{{ucwords($user->nama)}}</h4>
							</div>
							<div class="profile-email col-md-8 px-2 pt-2">
								<h4 class="text-muted mb-0">{{ucwords($user->email)}}</h4>
								<p>Email</p>
								<h4 class="text-muted mb-0">{{ucwords($user->notlp)}}</h4>
								<p>No Tlp</p>
								<button type="button"  class="btn btn-danger" data-toggle="modal" data-target="#password">
									<i class="fa fa-key"></i> Ganti Password
								</button>
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#profil">
									<i class="fa fa-user"></i> Update Profil
								</button>
							</div>

							<!-- password -->
							<div class="modal fade" id="password" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="staticBackdropLabel">Ganti Password</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<form action="{{url('admin/profil/change-password',$user->id)}}" method="post" enctype="multipart/form-data">
												@csrf
												@method('PUT')
												<div class="form-group">
													<input class="form-control" id="inputPassword1" name="current" type="password"  required="" placeholder="Password Lama">
													<div class="form-check form-switch d-flex align-items-center mb-3">
														<input class="form-check-input" type="checkbox" id="rememberMe" onclick="myFunction1()">
														<label class="form-check-label mb-0 ms-2" for="rememberMe" >Lihat</label>

													</div>
												</div>

												<div class="form-group">
													<input class="form-control" id="inputPassword2" name="confirm" type="password"  required="" placeholder="Password Baru">

													<div class="form-check form-switch d-flex align-items-center mb-3">
														<input class="form-check-input" type="checkbox" id="rememberMe" onclick="myFunction2()">
														<label class="form-check-label mb-0 ms-2" for="rememberMe" >Lihat</label>

													</div>
												</div>

												<div class="form-group">
													<input class="form-control" id="inputPassword3" name="new" type="password"  required="" placeholder="Konfirmasi Password Lama">
													<div class="form-check form-switch d-flex align-items-center mb-3">
														<input class="form-check-input" type="checkbox" id="rememberMe" onclick="myFunction3()">
														<label class="form-check-label mb-0 ms-2" for="rememberMe" >Lihat</label>

													</div>
												</div>
												<button class="btn btn-info float-right btn-block"><i class="fa fa-save" onclick="return confirm('Lanjutkan Untuk Mengganti password?')"></i> Ganti Password</button>
											</form>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
										</div>
									</div>
								</div>
							</div>


							<!-- profill -->
							<div class="modal fade" id="profil" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="staticBackdropLabel">Update Profil</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<form action="{{url('admin/profil/update',$user->id)}}" method="post" enctype="multipart/form-data">
												@csrf
												@method('PUT')
												<div class="form-group">
													<input class="form-control" name="nama" type="text"  required="" placeholder="Nama" value="{{ucwords($user->nama)}}">
												</div>

												<div class="form-group">
													<input class="form-control" name="email" type="text"  required="" placeholder="Email Aktif" value="{{ucwords($user->email)}}">
												</div>

												<div class="form-group">
													<input class="form-control" name="notlp" type="text"  required="" placeholder="Nomor Whatsapp/Tlp" value="{{$user->notlp}}">
												</div>
												<div class="form-group">
													<strong>Upload Foto</strong>
													<input class="form-control" name="foto" type="file" value="{{$user->notlp}}">
												</div>
												<button class="btn btn-info float-right btn-block"><i class="fa fa-save" onclick="return confirm('Lanjutkan Untuk Mengganti Profil ?')"></i> Update Profil</button>
											</form>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-12">
			<div class="card">
				<div class="card-body">
					<div class="profile-tab">
						<div class="custom-tab-1">
							<ul class="nav nav-tabs">
								<li class="nav-item"><a href="#my-posts" data-toggle="tab" class="nav-link active show">Posts</a>
								</li>
							</ul>
							<div class="tab-content">
								<div id="my-posts" class="tab-pane fade active show">
									<div class="my-post-content pt-3">
										<!-- formmmm------------ -->

										<div class="post-input">
											<textarea name="textarea"data-toggle="modal" data-target="#post" cols="30" rows="9" style="height: 120px" class="form-control shadow bg-transparent" placeholder="Masukan berita yang ingin di Post..."></textarea> 
											<!-- <a href="javascript:void()" class="btn btn-primary light px-3"><i class="fa fa-link"></i> </a> -->
											<button type="button" class="btn btn-light shadow" data-toggle="modal" data-target="#post">
												Foto <i class="fa fa-plus"></i><i class="fa fa-camera"></i>
											</button>
											<!-- modal post -->

											<div class="modal fade" id="post" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="staticBackdropLabel">Buat Berita</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<div class="card">
																<div class="card-body col-md-12">
																	<form action="{{url('admin/berita/create')}}" method="post" enctype="multipart/form-data">
																		@csrf
																		<button class="btn btn-info float-right mb-3" style="width: 150px; float: right;"><i class="fa fa-paper-plane"></i> Upload Berita</button>


																		<textarea name="judul" rows="9" class="form-control shadow bg-transparent" placeholder="Judul Beritat" required=""></textarea> 

																		<textarea name="isi" rows="9" style="height: 150px" class="form-control shadow bg-transparent" placeholder="Masukan berita yang ingin di Post" required=""></textarea> 

																		<div class="input-group mb-3">
																			<div class="input-group-prepend">
																				<span class="input-group-text bg-light"><i class="fa fa-plus"></i><i class="fa fa-camera"></i></span>
																			</div>
																			<div class="custom-file">
																				<input type="file" name="foto" class="custom-file-input" id="file" onchange="return fileValidation()" accept="image/*">
																				<label class="custom-file-label">Pilih Gambar</label>
																			</div>
																		</div>

																	</div>
																	<div class="card-body">
																		<!-- image preview -->
																		<div id="imagePreview" ></div>
																	</div>


																	<button class="btn btn-info shadow mb-3" ><i class="fa fa-paper-plane"></i> Upload Berita</button>
																</form>
															</div>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
														</div>
													</div>
												</div>
											</div>

											<!-- end modal post -->


											<a href="javascript:void()" class="btn ml-5 btn-info"><i class="fa fa-paper-plane"></i> Upload Berita</a>

										</div>

										<!-- end form berita---------------- -->

										<!-- isi berita -->
										@foreach($list_berita->sortByDesc('id') as $b)
										<div class="profile-uoloaded-post border-bottom-1 pb-5">
											<img src="{{url('public')}}/{{$b->foto}}" alt="" class="img-fluid" width="60%">
											<a class="post-title" data-toggle="modal" data-target="#baca{{$b->id}}"><h3 class="text-black">{{ucwords($b->judul)}}</h3></a>
											<div class="col-md-8">
												<p>{{ Str::limit($b->isi, 150) }}</p>
											</div>
											<!-- button baca -->
											

											<!-- Modal -->
											<div class="modal fade" id="baca{{$b->id}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="staticBackdropLabel">{{ucwords($b->judul)}}</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<div class="card">
																<div class="card-header">	
																	<img src="{{url('public')}}/{{$b->foto}}" alt="" width="100%">
																</div>
															</div>
															<p>	{{$b->isi}}</p>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
														</div>
													</div>
												</div>
											</div>
											<!-- button hapus -->
											<button type="button" class="btn mb-2 btn-primary" data-toggle="modal" data-target="#baca{{$b->id}}">
												<span class="mr-2"><i class="fa fa-eye"></i></span>Baca
											</button>

											<button type="button" class="btn mb-2 btn-warning" data-toggle="modal" data-target="#edit{{$b->id}}">
												<span class="mr-2"><i class="fa fa-edit"></i></span>Edit
											</button>

											<!-- modal dit berita -->

											<div class="modal fade" id="edit{{$b->id}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="staticBackdropLabel">Edit Berita</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<div class="card">
																<div class="card-body col-md-12">
																	<form action="{{url('admin/berita/update',$b->id)}}" method="post" enctype="multipart/form-data">
																		@csrf
																		@method("PUT")
																		<button class="btn btn-info float-right mb-3" style="width: 150px; float: right;"><i class="fa fa-paper-plane"></i> Upload Berita</button>


																		<textarea name="judul" rows="2" class="form-control shadow bg-transparent" placeholder="Judul Beritat">{{$b->judul}}</textarea> 

																		<textarea name="isi" rows="5" style="height: 150px" class="mt-3 form-control shadow bg-transparent" placeholder="Masukan berita yang ingin di Post">{{$b->isi}}</textarea> 

																		<div class="input-group mb-3 mt-3">
																			<div class="input-group-prepend">
																				<span class="input-group-text bg-light"><i class="fa fa-plus"></i><i class="fa fa-camera"></i></span>
																			</div>
																			<div class="custom-file">
																				<input type="file" name="foto" class="custom-file-input" id="file1" onchange="return fileValidation()" accept="image/*">
																				<label class="custom-file-label">Pilih Gambar</label>
																			</div>
																		</div>

																	</div>
																	<div class="card-body">
																		<!-- image preview -->
																		<div id="imagePreview1"></div>
																	</div>


																	<button class="btn btn-info shadow mb-3" ><i class="fa fa-paper-plane"></i> Upload Berita</button>
																</form>
															</div>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
														</div>
													</div>
												</div>
											</div>
											<!-- end modal edit -->
											
											@include('admin.utils.hapus-berita', ['url' =>url('admin/berita/delete', $b->id)])

										</div>
										@endforeach
									</div>
								</div>
								{{$list_berita->links()}}
							</div>
						</div>
					</div>
					<script>
						function myFunction2() {
							var x = document.getElementById("inputPassword2");
							if (x.type === "password") {
								x.type = "text";
							} else {
								x.type = "password";
							}
						}
						function myFunction1() {
							var x = document.getElementById("inputPassword1");
							if (x.type === "password") {
								x.type = "text";
							} else {
								x.type = "password";
							}
						}
						function myFunction3() {
							var x = document.getElementById("inputPassword3");
							if (x.type === "password") {
								x.type = "text";
							} else {
								x.type = "password";
							}
						}
					</script>
					<!-- upload gambar -->
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
        		document.getElementById('imagePreview').innerHTML = '<img src="'+e.target.result+'" style="width:100%"/>';
        	};
        	reader.readAsDataURL(fileInput.files[0]);
        }
    }
}
</script>
<script>
	function fileValidation(){
		var fileInput = document.getElementById('file1');
		var filePath = fileInput.value;
		var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
        //Image preview
        if (fileInput.files && fileInput.files[0]) {
        	var reader = new FileReader();
        	reader.onload = function(e) {
        		document.getElementById('imagePreview1').innerHTML = '<img src="'+e.target.result+'" style="width:100%"/>';
        	};
        	reader.readAsDataURL(fileInput.files[0]);
        }
    }

</script>

@endsection

