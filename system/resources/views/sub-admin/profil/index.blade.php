@extends('sub-admin.template.base')
@section('content')
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
											<form action="{{url('sub-admin/profil/change-password',$user->id)}}" method="post" enctype="multipart/form-data">
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
											<form action="{{url('sub-admin/profil/update',$user->id)}}" method="post" enctype="multipart/form-data">
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
@endsection