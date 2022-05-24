@extends('sub-admin.template.base')
@section('content')

<div class="container-fluid">
	<div class="card shadow">
		<div class="card-header d-sm-flex d-block pb-0 border-0">
			<div class="mr-auto pr-3 mb-sm-0 mb-3">
				<h4 class="text-black fs-20">Data Transaksi</h4>
			</div>
			<button type="button"class="btn rounded btn-primary mb-3" data-toggle="modal" data-target="#create"><i class="fa fa-plus"></i> Tambah Data</button>

			<!-- Modal -->
			<div class="modal fade" id="create" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="staticBackdropLabel">Tambah Metode Transaksi</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form action="{{url('sub-admin')}}/transaksi/create" method="post" enctype="multipart/form-data">
								@csrf
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<p class="mb-1">Nama Transaksi</p>
											<input type="text" name="nama" class="form-control shadow" required="" placeholder="Nama Transaksi">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<div class="example">
												<p class="mb-1">Icon</p>
												<input type="file" class=" form-control shadow" name="foto" required="" accept="image/*">
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

			<!-- end modal -->
		</div>
	</div>

	<div class="card-body">
		<div class="table-responsive">
			<table id="example" class="display table-datatable table ">
				<thead>
					<tr class="btn-light">
						<th width="30px">No</th>
						<th width="80px">Icon</th>
						<th class="text-center">Nama Transaksi</th>
						<th width="50px">Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($list_transaksi->sortBy('nama') as $k)
					<tr>
						<td>{{$loop->iteration}}</td>
						<td><img src="{{url('public')}}/{{$k->foto}}" width="80px"></td>
						<td class="text-center">{{ucwords($k->nama)}}</td>
						<td>
								@include('sub-admin.utils.hapus', ['url' =>url('sub-admin/transaksi', $k->id)])
							
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection