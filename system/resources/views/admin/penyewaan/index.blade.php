@extends('admin.template.base')
@section('content')

<div class="container-fluid">
	<div class="card shadow">
		<div class="card-header d-sm-flex d-block pb-0 border-0">
			<div class="mr-auto pr-3 mb-sm-0 mb-3">
				<h4 class="text-black fs-20">Data Penyewaan</h4>
			</div>
		</div>
	</div>
	<div class="card shadow">
		<div class="card-body">
			<div class="table-responsive">
				<table id="example" class="display table-hover table-datatable table ">
					<thead>
						<tr>
							<th width="30px">No</th>
							<th width="50px" class="text-center">Action</th>
							<th>Kode Boking</th>
							<th>Tgl/Jam Main</th>
							<th>Lama Main</th>
							<th>Status</th>
							<th class="text-center">Nama Penyewa</th>
						</tr>
					</thead>
					@foreach($list_penyewaan->sortBy('id') as $k)
					<tr>
						<td>{{$loop->iteration}}</td>
						<td>
							<div class="btn-group">
								<button type="button" class="btn btn-sm btn-primary light" data-toggle="modal" title="Info" data-target="#info{{$k->idp}}"><i class="fa fa-info " style="color: #000000; font-weight: bold;"></i></button>

								<button type="button" class="btn btn-sm btn-primary light"  style="color: #000000; font-weight: bold;" title="Bukti Pembayaran" data-toggle="modal" data-target="#bukti{{$k->idp}}">
									<i class="fa fa-money"></i>
								</button>

								<button type="button" class="btn btn-sm btn-primary light"  style="color: #000000; font-weight: bold;" title="Bukti Pembayaran" data-toggle="modal" data-target="#kodeqr{{$k->idp}}">
									<i class="fa fa-qrcode"></i>
								</button>


								<!-- Modal QR-->
								<div class="modal fade" id="kodeqr{{$k->idp}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="staticBackdropLabel">Masuk Lapangan</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<center>
													{!! QrCode::size(200)->generate('192.168.1.34/pengadilan-ketapang/public/'.$k->file); !!}
												</center>
											</div>
										</div>
									</div>
								</div>
							</div>
						</td>
						<td >{{strtoupper($k->kode_transaksi)}}</td>
						<td >{{$k->tgl}}, {{$k->jam}}</td>
						<td>{{$k->lama}} Jam</td>
						<td>

							<div class="btn-group">
								<form action="{{url('admin/penyewaan/status',$k->idp)}}" method="post">
									@csrf
									@method('PUT')
									<input class="form-control" type="hidden" value="1"></input>
									<button class="btn btn-success"><i class="fa fa-check"></i></button>
								</form>

								<form action="{{url('admin/penyewaan/status',$k->idp)}}" method="post">
									@csrf
									@method('PUT')
									<input class="form-control" type="hidden" value="2"></input>
									<button class="btn btn-danger"><i class="fa fa-times"></i></button>
								</form>
							</div>

							
						</td>
						<td class="text-center">{{ucwords($k->nama_penyewa)}}</td>
						<!-- Modal -->
						<div class="modal fade" id="bukti{{$k->idp}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="staticBackdropLabel">Bukti Penyewaan</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										@if ($k->bukti == "Belum Melakukan Pembayaran")
										<b>Belum Melakukan Pembayaran,</b>
										<i>Status jangan diterima jika belum melakukan pembayaran</i>
										@else
										<img src="{{url('public')}}/{{$k->bukti}}" width="100%" alt="">
										@endif
									</div>
								</div>
							</div>
						</div>

						<!-- info -->
						<div class="modal fade" id="info{{$k->idp}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="staticBackdropLabel">Detail Pemesanan</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<div class="col-sm-12">
											<div class="card ">
												<div class="card-body bg-primary shadow" style="border-radius: 10px">
													<div class=" align-items-center">
														<div class="media-body">
															<h4 class="text-white">Total Bayar</h4>
															<h2 class="title text-white">Rp. {{number_format($k->tharga)}}</h2>
														</div>
													</div>
												</div>
											</div>
										</div>
										<h3>{{strtoupper($k->nama_gedung)}}</h3><hr>
										<p> Nama Penyea : <b>{{ucwords($k->nama_penyewa)}}</b> <br>
											Kode Boking :<b> {{strtoupper($k->kode_transaksi)}}</b> <br>
											Metode Pembayaran : <b>{{ucwords($k->nama_transaksi)}}</b><br>
											Akun Penerima : <b>{{strtoupper($k->an)}}</b> <br>
											Nomor Penerima : <b>{{strtoupper($k->nomor_transaksi)}}</b><br>
											Staus Penerimaan : <b>{{strtoupper($k->status)}}</b> <br>
										</p>
									</div>
								</div>
							</div>
						</div>
					</tr>
					@endforeach
				</table>
			</div>
		</div>
	</div>
</div>

@endsection