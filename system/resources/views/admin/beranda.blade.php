@extends('admin.template.base')
@section('content')
<div class="container-fluid">
	<div class="alert alert-success alert-dismissible fade show" role="alert">
		<h4 class="alert-heading">Selamat Datang {{ucwords($user->nama)}}!</h4>
		<p>Silahkan cek pada form penyewaan apakah hari ini ada yang telah melakukan penyewaan, dan jangan lupa
		siapkan gedung gedung anda.</p>
		<hr>
		<p class="mb-0">Semoga Rezeki Hari Ini Melimpah Untukmu : )</p>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>

	<div class="row card-body">
		<div class="col-xl-6 col-xxl-12">
			<div class="row">
				<div class="col-sm-6 col-xl-4 col-6 ">
					<div class="card avtivity-card bg-danger">
						<div class="card-body">
							<div class="media align-items-center">
								<span class="activity-icon bgl-secondary  mr-md-4 mr-3">
									<svg width="30" height="37" viewBox="0 0 40 37" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M1.64826 26.5285C0.547125 26.7394 -0.174308 27.8026 0.0366371 28.9038C0.222269 29.8741 1.07449 30.5491 2.02796 30.5491C2.15453 30.5491 2.28531 30.5364 2.41188 30.5112L10.7653 28.908C11.242 28.8152 11.6682 28.5578 11.9719 28.1781L15.558 23.6554L14.3599 23.0437C13.4739 22.5965 12.8579 21.7865 12.6469 20.8035L9.26338 25.0688L1.64826 26.5285Z" fill="#A02CFA"/>
										<path d="M31.3999 8.89345C33.8558 8.89345 35.8467 6.90258 35.8467 4.44673C35.8467 1.99087 33.8558 0 31.3999 0C28.9441 0 26.9532 1.99087 26.9532 4.44673C26.9532 6.90258 28.9441 8.89345 31.3999 8.89345Z" fill="#A02CFA"/>
										<path d="M21.6965 3.33297C21.2282 2.85202 20.7937 2.66217 20.3169 2.66217C20.1439 2.66217 19.971 2.68748 19.7853 2.72967L12.1534 4.53958C11.0986 4.78849 10.4489 5.84744 10.6979 6.89795C10.913 7.80079 11.7146 8.40831 12.6048 8.40831C12.7567 8.40831 12.9086 8.39144 13.0605 8.35347L19.5618 6.81357C19.9837 7.28187 22.0974 9.57273 22.4813 9.97775C19.7938 12.855 17.1064 15.7281 14.4189 18.6054C14.3767 18.6519 14.3388 18.6982 14.3008 18.7446C13.5161 19.7445 13.7566 21.3139 14.9379 21.9088L23.1774 26.1151L18.8994 33.0467C18.313 34.0002 18.6083 35.249 19.5618 35.8396C19.8951 36.0464 20.2621 36.1434 20.6249 36.1434C21.3042 36.1434 21.9707 35.8017 22.3547 35.1815L27.7886 26.3766C28.0882 25.8915 28.1683 25.305 28.0122 24.7608C27.8561 24.2123 27.4806 23.7567 26.9702 23.4993L21.3885 20.66L27.2571 14.3823L31.6869 18.1371C32.0539 18.4493 32.5054 18.6012 32.9526 18.6012C33.4335 18.6012 33.9145 18.424 34.2899 18.078L39.3737 13.3402C40.1669 12.6019 40.2133 11.3615 39.475 10.5684C39.0868 10.1549 38.5637 9.944 38.0406 9.944C37.5638 9.944 37.0829 10.117 36.7074 10.4671L32.9019 14.0068C32.8977 14.011 23.363 5.04163 21.6965 3.33297Z" fill="#A02CFA"/>
									</svg>
								</span>
								<div class="media-body text-white">
									<p class="fs-14 mb-2">Disewa</p>
									<span class="title text-white font-w600">{{$disewa}}x</span>
								</div>
							</div>
						</div>
						<div class="effect bg-secondary"></div>
					</div>
				</div>

				<div class="col-sm-6 col-xl-4 col-6 ">
					<div class="card avtivity-card bg-info">
						<div class="card-body">
							<div class="media align-items-center">
								<span class="activity-icon bgl-secondary  mr-md-4 mr-3">
									<svg width="35" height="30" viewBox="0 0 40 39" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M18.0977 7.90402L9.78535 16.7845C9.17929 17.6683 9.40656 18.872 10.2862 19.4738L18.6574 25.2104V30.787C18.6574 31.8476 19.4992 32.7357 20.5598 32.7568C21.6456 32.7735 22.5295 31.9023 22.5295 30.8207V24.1961C22.5295 23.5564 22.2138 22.9588 21.6877 22.601L16.3174 18.9184L20.8376 14.1246L23.1524 19.3982C23.4596 20.101 24.1582 20.5556 24.9243 20.5556H31.974C33.0346 20.5556 33.9226 19.7139 33.9437 18.6532C33.9605 17.5674 33.0893 16.6835 32.0076 16.6835H26.1953C25.4293 14.9411 24.6128 13.2155 23.9015 11.4478C23.5395 10.5556 23.3376 10.1684 22.6726 9.55389C22.5379 9.42763 21.5993 8.56904 20.7618 7.80305C19.9916 7.10435 18.8047 7.15065 18.0977 7.90402Z" fill="#FF3282"/>
										<path d="M26.0269 8.87206C28.4769 8.87206 30.463 6.88598 30.463 4.43603C30.463 1.98608 28.4769 0 26.0269 0C23.577 0 21.5909 1.98608 21.5909 4.43603C21.5909 6.88598 23.577 8.87206 26.0269 8.87206Z" fill="#FF3282"/>
										<path d="M8.16498 38.388C12.6744 38.388 16.33 34.7325 16.33 30.2231C16.33 25.7137 12.6744 22.0581 8.16498 22.0581C3.65559 22.0581 0 25.7137 0 30.2231C0 34.7325 3.65559 38.388 8.16498 38.388Z" fill="#FF3282"/>
										<path d="M31.835 38.388C36.3444 38.388 40 34.7325 40 30.2231C40 25.7137 36.3444 22.0581 31.835 22.0581C27.3256 22.0581 23.67 25.7137 23.67 30.2231C23.67 34.7325 27.3256 38.388 31.835 38.388Z" fill="#FF3282"/>
									</svg>
								</span>
								<div class="media-body text-white">
									<p class="fs-14 mb-2">Pembayaran</p>
									<span class="title text-white font-w600">{{$pembayaran}}x</span>
								</div>
							</div>
						</div>
						<div class="effect bg-secondary"></div>
					</div>
				</div>
			</div>


			<div class="row">
				<!-- card qr code -->
				<div class="col-md-4">
					<div class="card shadow">
						<div class="card-body text-center">
							<i class="fa fa-qrcode fa-4x" style="color: #2F99C5"></i><br>
							<p>Scan kode boking untuk memasuki lapangan</p>
							<button type="button" class="btn btn-sm btn-info" title="Bukti Pembayaran" data-toggle="modal" data-target="#kodeqr">
								Scan QR Pesanana
							</button>
						</div>
					</div>
					<div class="effect bg-danger"></div>
			
				</div>

				<!-- Modal QR-->
				<div class="modal fade" id="kodeqr" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="staticBackdropLabel">Masuk Lapangan</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">


								<div class="card-body form-user mt-1">
									<input type="text" name="kode" id="hasilscan" placeholder="Kode Pesanan" readonly="" class="form-control">
									<button class="btn btn-info btn-sm text-center mt-3">Masuk</button>
									<div class="embed-responsive embed-responsive-1by1">
										<video id="previewKamera" style="width: 100%;height: 100%; margin-top: 10px; border-radius: 5px, "></video>
									</div>
									<select id="pilihKamera" hidden="">
									</select>
									
								</div>
							</div>
						</div>
					</div>
				</div>
			<!-- end card qr code -->

			<!-- card pesanan baru -->
			<div class="col-md-8">
				<div class="card shadow">
					<div class="card-body table-responsive">
						<span class="badge badge-success mb-3 badge-sm">Pemain berikutnya hari ini</span>
						<table class="table table-hover mt-3"  id="example" >
							<thead>
								<tr>
									<th>#</th>
									<th>Kode Pesanan</th>
									<th>Nama Pemesan</th>
									<th>Waktu Main</th>
								</tr>
							</thead>

							<tbody>
								@foreach($list_pesanan as $p)
								<tr>
									<td>{{$loop->iteration}}</td>
									<td>{{$p->kode_transaksi}}</td>
									<td>{{$p->penyewa->nama}}</td>
									<td><i class="fa fa-calendar"></i> {{$p->tgl}}<br> <i class="fa fa-clock-o"></i> {{$p->jam}}</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- end card pesanan baru -->
			</div>
			<!-- end row 2 -->
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

                                $("#hasilscan").val(result.text);
                                // star ajax
                                $kode1 = document.getElementById("hasilscan");
                                $kode =  $("#hasilscan").val(result.text);
                                if($kode1 != null){

                                	var data = $('.form-user').serialize();
                                	var ajaxurl = "{{url('admin/scan-qr')}}";

                                	$.get(`{{url('admin/scan-qr')}}/${result.text}`, () => {
                                		alert("success");
                                		let url = "{{url('admin/beranda')}}";
                                		window.location.href = url;
                                	})

                                } else{
                                	alert('data kosong');
                                }

                                // end ajax


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