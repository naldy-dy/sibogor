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
								<button type="button" class="btn btn-sm btn-primary light" data-toggle="modal" title="Info" data-target="#info{{$k->id}}"><i class="fa fa-info " style="color: #000000; font-weight: bold;"></i></button>

								<button type="button" class="btn btn-sm btn-primary light"  style="color: #000000; font-weight: bold;" title="Bukti Pembayaran" data-toggle="modal" data-target="#bukti{{$k->id}}">
									<i class="fa fa-money"></i>
								</button>

								<button type="button" class="btn btn-sm btn-primary light"  style="color: #000000; font-weight: bold;" title="Bukti Pembayaran" data-toggle="modal" data-target="#kodeqr{{$k->id}}">
									<i class="fa fa-qrcode"></i>
								</button>


								<!-- Modal QR-->
								<div class="modal fade" id="kodeqr{{$k->id}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="staticBackdropLabel">Masuk Lapangan</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												

												<div class="card-body mt-1">

													<input type="text" id="hasilscan" placeholder="Kode Pesanan" readonly="" class="form-control">
													<div class="embed-responsive embed-responsive-1by1">
														<video id="previewKamera" style="width: 100%x;height: 100%;"></video>
													</div>
													<select id="pilihKamera" hidden="">
													</select>
													<br>
													<button class="btn btn-info">Masuk Ruangan</button>


													<div class="mt-5">
														<b>QR Code</b> <br>
														{!! QrCode::size(200)->generate($k->kode_transaksi); !!}
													</div>
												</div>
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
								<form action="{{url('admin/penyewaan/status-terima',$k->idp)}}" method="post">
									@csrf
									@method('PUT')
									<button class="btn btn-success" onclick="return confirm('Yakin menerima penyewaan?')"><i class="fa fa-check"></i></button>
								</form>

								<form action="{{url('admin/penyewaan/status-tolak',$k->idp)}}" method="post">
									@csrf
									@method('PUT')
									<button class="btn btn-danger" onclick="return confirm('Yakin menolak penyewaan?')"><i class="fa fa-times"></i></button>
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

@endsection