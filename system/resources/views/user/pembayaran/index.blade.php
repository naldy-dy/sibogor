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
							<th>Generate</th>
						</tr>
					</thead>
					<tbody class="fs-14">
						@foreach($list_penyewaan->sortByDesc('id') as $t)
						<tr>
							<td>{{$loop->iteration}}</td>
							<td>
								<div class="btn-group">
								<a href="{{url('pembayaran/bayar',$t->id)}}" class="btn btn-primary light btn-sm"><i class="fa fa-money"></i></a>
								<button type="button" class="btn btn-primary light btn-sm" data-toggle="modal" data-target="#exampleModalCenter{{$t->id}}">
									<i class="fa fa-info"></i>
								</button>
								<button type="button" class="btn btn-primary light btn-sm" data-toggle="modal" data-target="#qr{{$t->id}}">
									QR
								</button>
								<a href="{{url('pemilik',$t->id_admin)}}" class="btn btn-primary light btn-sm"><i class="fa fa-user"></i></a>
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
														<td>{{ucwords($t->nama_transaksi)}} / {{ucwords($t->no_transaksi)}}</td>
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

								<div class="modal fade" id="qr{{$t->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLongTitle">{{strtoupper($t->gnama)}}</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<div class="card">
													<div class="card-body">
												<div id="reader" width="600px"></div>
														
													</div>

													<div class="card-body mt-1">
														<input type="text" id="result" class="form-control">
													</div>
												</div>
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
							<td> <button class="btn btn-primary btn-sm"> {{$t->status}}</button></td>
							<td><a href="{{url('generate',$t->id)}}" class="btn btn-primary">Generate Code</a></td>
						</tr>
						@endforeach
					</tbody>
				</table>

				<!-- Button trigger modal -->

			</div>
		</div>

	</div>

</div>

<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
<script>
	
	function onScanSuccess(decodedText, decodedResult) {
  // handle the scanned code as you like, for example:
  console.log(`Code matched = ${decodedText}`, decodedResult);
}

function onScanFailure(error) {
  // handle scan failure, usually better to ignore and keep scanning.
  // for example:
  console.warn(`Code scan error = ${error}`);
}

let html5QrcodeScanner = new Html5QrcodeScanner(
  "reader",
  { fps: 60, qrbox: {width: 250, height: 250} },
  /* verbose= */ false);
html5QrcodeScanner.render(onScanSuccess, onScanFailure);

</script>

@endsection