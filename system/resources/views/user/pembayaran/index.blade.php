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
													<!-- <div class="card-body">
														<div id="reader" width="600px"></div>
														
													</div> -->

													<div class="card-body mt-1">
														<center>
															<h4>Scan QR</h4>
														{!! QrCode::size(200)->generate($t->kode_transaksi); !!}
														<p>Kode QR akan di scan oleh admin saat ingin memulai permainan</p>
														</center>
														<!-- <input type="text" id="hasilscan" placeholder="Kode Pesanan" readonly="" class="form-control"> -->
														<!-- <div class="embed-responsive embed-responsive-1by1">
														<video id="previewKamera" style="width: 100%x;height: 100%;"></video>
														</div>
														<select id="pilihKamera" hidden="">
														</select>
														<br> -->
													<!-- 	<button class="btn btn-info">Masuk Ruangan</button>			 -->										
													</div>
												</div>
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
<!-- <script>
	
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


<script type="text/javascript" src="https://unpkg.com/@zxing/library@latest"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

<script>
	let selectedDeviceId = null;
	const codeReader = new ZXing.BrowserMultiFormatReader();
	const sourceSelect = $("#pilihKamera");

	$(document).on('change','#pilihKamera',function(){
		selectedDeviceId = $(this).val();
		if(codeReader){
			codeReader.reset()
			initScanner()
		}
	})

	function initScanner() {
		codeReader
		.listVideoInputDevices()
		.then(videoInputDevices => {
			videoInputDevices.forEach(device =>
				console.log(`${device.label}, ${device.deviceId}`)
				);

			if(videoInputDevices.length > 0){

				if(selectedDeviceId == null){
					if(videoInputDevices.length > 1){
						selectedDeviceId = videoInputDevices[1].deviceId
					} else {
						selectedDeviceId = videoInputDevices[0].deviceId
					}
				}


				if (videoInputDevices.length >= 1) {
					sourceSelect.html('');
					videoInputDevices.forEach((element) => {
						const sourceOption = document.createElement('option')
						sourceOption.text = element.label
						sourceOption.value = element.deviceId
						if(element.deviceId == selectedDeviceId){
							sourceOption.selected = 'selected';
						}
						sourceSelect.append(sourceOption)
					})

				}

				codeReader
				.decodeOnceFromVideoDevice(selectedDeviceId, 'previewKamera')
				.then(result => {

                                //hasil scan
                                console.log(result.text)
                                $("#hasilscan").val(result.text);

                                if(codeReader){
                                	codeReader.reset()
                                }
                            })
				.catch(err => console.error(err));

			} else {
				alert("Kamera tidak terdeteksi!")
			}
		})
		.catch(err => console.error(err));
	}


	if (navigator.mediaDevices) {


		initScanner()


	} else {
		alert('Tidak dapat akses kamera.');
	}

</script>
 -->
@endsection