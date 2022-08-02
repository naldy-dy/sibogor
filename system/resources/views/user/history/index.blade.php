@extends('user.template.base')
@section('content')
<div class="container-fluid">
	<div class="card shadow">
		<div class="card-header d-sm-flex d-block pb-0 border-0">
			<div class="mr-auto pr-3 mb-sm-0 mb-3">
				<h4 class="text-black fs-20">Data Pembokingan</h4>
			</div>

		</div>
		<div class="card-body">
			<div class="table-responsive" style="overflow-x:scroll;">
				<table id="example" class="display table-datatable table" style="width:150%">
					<thead>
						<tr>
							<th width="30px">No</th>
							<th>Action</th>
							<th>Kode Boking</th>
							<th>Tgl Boking/Jam</th>
							<th>An</th>
							<th>Total Bayar</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody class="fs-14">
						@foreach($list_penyewaan as $t)
						<tr>
							<td>{{$loop->iteration}}</td>
							<td>
								<div class="btn-group">
								<a href="{{url('pembayaran/bayar',$t->id)}}" class="btn btn-warning btn-sm">Bayar</a>
								<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalCenter{{$t->id}}">
									Detail
								</button>
								</div>

								<!-- Modal -->
								<div class="modal fade" id="exampleModalCenter{{$t->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLongTitle">{{strtoupper($t->gnama)}}</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<table class="table table-hover table-datatable">
													<tr>
														<th>Kode Boking</th>
														<td>: {{strtoupper ($t->kode_transaksi)}}</td>
													</tr>
													<tr>
														<th>Tgl/Jam Boking</th>
														<td>: {{ucwords($t->tgl)}}/{{$t->jam}}</td>
													</tr>
													<tr>
														<th>Lama Main</th>
														<td>: {{ucwords($t->lama)}} Jam</td>
													</tr>
													<tr>
														<th>Total Bayar</th>
														<td>: Rp. {{number_format($t->tharga)}}</td>
													</tr>
													<tr>
														<th>Metode Pembayaran Via</th>
														<td>:Nama Pembayaran/Nomor{{ucwords($t->no)}}</td>
													</tr>
													<tr>
														<th>Alamat Gedung</th>
														<td>:{{ucwords($t->galamat)}}</td>
													</tr>
												</table>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
											</div>
										</div>
									</div>
								</div>
							</td>
							<td>{{strtoupper ($t->kode_transaksi)}}</td>
							<td>{{ucwords($t->tgl)}}/{{$t->jam}}</td>
							<td>{{ucwords($t->an)}}</td>
							<td>Rp. {{number_format($t->tharga)}}</td>
							<td>
								@if($t->status == 0)
								<button class="btn btn-danger btn-sm">Ditolak</button>
								@elseif($t->status == 4)
								<button class="btn btn-primary btn-sm">Selesai</button>
								@endif

							</td>
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