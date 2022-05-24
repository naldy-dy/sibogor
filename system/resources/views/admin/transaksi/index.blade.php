@extends('admin.template.base')
@section('content')

<div class="container-fluid">
	<div class="card shadow">
		<div class="card-header d-sm-flex d-block pb-0 border-0">
			<div class="mr-auto pr-3 mb-sm-0 mb-3">
				<h4 class="text-black fs-20">Data Transaksi</h4>
			</div>

			<button type="button"  class="btn rounded btn-primary mb-3" data-toggle="modal" data-target="#staticBackdrop">
				<i class="fa fa-plus"></i> Tambah
			</button>

			<!-- modal tambah data -->
			<div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="staticBackdropLabel">Metode Pembayaran</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form action="{{url('admin')}}/transaksi/create" method="post" enctype="multipart/form-data">
								@csrf
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<p class="mb-1">Pilih Metode</p>
											<div class="radio">
												@foreach($metode as $m)
												<label><input type="radio" name="id_transaksi" required="" class="ml-3" value="{{$m->id}}"> 
													<img src="{{url('public')}}/{{$m->foto}}" width="80px">
												</label>
												@endforeach
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<p class="mb-1">An</p>
													<input type="text" class=" form-control shadow" name="nama" required="" placeholder="Atas Nama ">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<p class="mb-1">Nomor</p>
													<input type="text" class=" form-control shadow" name="no" required="" placeholder="Nomor Transaksi">
												</div>
											</div>
										</div>

									</div>
								</div>			
								<button class="btn btn-primary float-right"><i class="fa fa-save"></i> Tambahkan</button>
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
			<!-- end modal -->
		</div>
	</div>
<div class="card shadow">
	<div class="card-body">
			<div class="table-responsive">
				<table id="example" class="display table-hover table-datatable table ">
					<thead>
						<tr>
							<th width="30px">No</th>
							<th width="50px">Aksi</th>
							<th width="80px">Ikon</th>
							<th width="80px">No Pembayaran</th>
							<th width="80px">Pemilik Akun</th>
							<th class="text-center">Nama Transaksi</th>
						</tr>
					</thead>
					<tbody>
						@foreach($list_transaksi->sortBy('nama') as $k)
						<tr>
							<td>{{$loop->iteration}}</td>
							<td>
								<div class="btn-group">
								<!-- Button trigger modal -->
									<button type="button" class="btn btn-primary light" data-toggle="modal" data-target="#edit{{$k->idt}}">
									  <i class="fa fa-pencil"></i>
									</button>
								 @include('sub-admin.utils.hapus', ['url' =>url('admin/transaksi/delete', $k->idt)])
								 </div>
							</td>
							<td><img src="{{url('public')}}/{{$k->tfoto}}" width="80px"></td>
							<td class="text-center">{{ucwords($k->no)}}</td>
							<td class="text-center">{{ucwords($k->nama)}}</td>
							<td class="text-center">{{ucwords($k->tnama)}}</td>
						</tr>

						<div class="modal fade" id="edit{{$k->idt}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Metode Pembayaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="{{url('admin/transaksi/update',$k->idt)}}" method="post" enctype="multipart/form-data">
				@csrf
				@method("PUT")
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<p class="mb-1">Pilih Metode</p>
							<div class="radio">
								@foreach($metode as $m)
								<label><input type="radio" name="id_transaksi" required=""  class="ml-3" value="{{$m->id}}"> 
									<img src="{{url('public')}}/{{$m->foto}}" width="80px">
								</label>
								@endforeach
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<p class="mb-1">An</p>
									<input type="text" class=" form-control shadow" name="nama" required="" value="{{$k->nama}}" placeholder="Atas Nama ">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<p class="mb-1">Nomor</p>
									<input type="text" class=" form-control shadow" name="no" required="" value="{{$k->no}}" placeholder="Nomor Transaksi">
								</div>
							</div>
						</div>
						
					</div>
				</div>			
				<button class="btn btn-primary float-right"><i class="fa fa-save"></i> Tambahkan</button>
			</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

@endsection