@extends('sub-admin.template.base')
@section('content')
<div class="container-fluid">
	<div class="card shadow">
		<div class="card-header d-sm-flex d-block pb-0 border-0">
			<div class="mr-auto pr-3 mb-sm-0 mb-3">
				<h4 class="text-black fs-20">Data Gedung</h4>
			</div>

		</div>
		<div class="card-body">
			<div class="table-responsive" style="overflow-x:scroll;">
				<table id="example" class="display table-hover table-datatable table" style="width:150%">
					<thead>
						<tr class="bg-light">
							<th width="30px">No</th>
							<th>Action</th>
							<th>Nama</th>
							<th>Harga Boking</th>
							<th>Alamat</th>
						</tr>
					</thead>
					<tbody>
						@foreach($list_gedung as $gedung)
						<tr>
							<td>{{$loop->iteration}}</td>
							<td>
								<div class="btn-group">
									<button type="button" class="btn btn-primary light" data-toggle="modal" data-target="#staticBackdrop"><i class="fa fa-info"></i></button>									@include('sub-admin.utils.hapus', ['url' =>url('sub-admin/kategori', $gedung->id)])
								</div>
							</td>
							<td>{{ucwords($gedung->nama)}}</td>
							<td>Rp. {{number_format($gedung->harga)}}</td>
							<td>{{$gedung->alamat}}</td>

							<!-- Modal -->
							<div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<div class="card">
												<div class="card-header">
													<img src="{{url('public')}}/{{$gedung->foto}}" width="100%" alt="">
												</div>
												<div class="card-body">
													<p><b>Nama Gedung :</b> {{ucwords($gedung->nama)}}<br>
													<b>Alamat :</b> {{ucwords($gedung->alamat)}} <br>
													<b>Harga Boking :</b> Rp. {{number_format($gedung->harga)}} /Jam
												</p>
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										</div>
									</div>
								</div>
							</div>
						</tr>
						@endforeach
					</tbody>
				</table>

				<!-- Button trigger modal -->

			</div>
		</div>

	</div>

</div>

@endsection