@extends('sub-admin.template.base')
@section('content')

<div class="container-fluid">
	<div class="card shadow">
		<div class="card-header d-sm-flex d-block pb-0 border-0">
			<div class="mr-auto pr-3 mb-sm-0 mb-3">
				<h4 class="text-black fs-20">Data Kategori</h4>
			</div>

			<button type="button" class="btn rounded btn-primary mb-3" data-toggle="modal" data-target="#create"><i class="fa fa-plus"></i> Tambah Data</button>

			<!-- Modal -->
			<div class="modal fade" id="create" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="staticBackdropLabel">Tambah Data Kategori</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form action="{{url('sub-admin')}}/kategori/create" method="post" enctype="multipart/form-data">
								@csrf
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<p class="mb-1">Kategori Gedung</p>
											<input type="text" name="kategori" class="form-control shadow" required="" placeholder="Kategori">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<div class="example">
												<p class="mb-1">Icon</p>
												<input type="file" class=" form-control shadow" name="icon" required="" accept="image/*">
											</div>
										</div>
									</div>
								</div>			
								<button class="btn btn-primary btn-block"><i class="fa fa-save"></i> Simpan</button>
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>




			<!-- end modal  -->
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table id="example" class="display table-datatable table">
					<thead>
						<tr>
							<th width="30px">No</th>
							<th width="50px">Action</th>
							<th class="text-center" width="100px">Icon</th>
							<th class="text-center">Kategori</th>
						</tr>
					</thead>
					<tbody>
						@foreach($list_kategori as $k)
						<tr>
							<td>{{$loop->iteration}}</td>
							<td>
								<div class="btn-group">
									<button type="button" class="btn btn-primary light btn-sm" data-toggle="modal" data-target="#edit{{$k->id}}"><i class="fa fa-pencil"></i></button>
									@include('sub-admin.utils.hapus', ['url' =>url('sub-admin/kategori', $k->id)])
								</div>
							</td>
							<td><img src="{{url("public/$k->icon")}}" alt=" " width="70%"></td>
							<td class="text-center">{{ucwords($k->kategori)}}</td>



							<!-- Modal -->
							<div class="modal fade" id="edit{{$k->id}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<form action="{{url('sub-admin/kategori/update',$k->id)}}" method="post" enctype="multipart/form-data">
												@csrf
												@method('PUT')
												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<p class="mb-1">Kategori Gedung</p>
															<input type="text" name="kategori" class="form-control shadow" required="" placeholder="Kategori" value="{{$k->kategori}}">
														</div>
													</div>
													<div class="col-md-12">
														<div class="form-group">
															<div class="example">
																<p class="mb-1">Icon</p>
																<input type="file" class=" form-control shadow" name="foto" accept="image/*">
															</div>
														</div>
													</div>
												</div>		

												<button class="btn btn-primary btn-block"><i class="fa fa-save"></i> Simpan</button>



											</form>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
										</div>
									</div>
								</div>
							</div>


							<!-- end modal edit -->
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>

	</div>

</div>

<script>
	const btn = document.getElementById('btn');
	btn.addEventListener('click', function(){
		Swal.fire({
			title: 'Are you sure?',
			text: "You won't be able to revert this!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
			if (result.isConfirmed) {
				Swal.fire(
					'Deleted!',
					'Your file has been deleted.',
					'success'
					)
			}
		})
	});
	
</script>

@endsection