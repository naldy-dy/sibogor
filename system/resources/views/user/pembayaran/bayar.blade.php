@extends('user.template.base')
@section('content')

<div class="container-fluid">
	<!-- Header Page -->
	<div class="card">
		<div class="card-header shadow d-sm-flex d-block pb-0 border-0">
			<div class="mr-auto pr-3 mb-sm-0 mb-3">
				<h4 class="text-black fs-30">Pembayaran</h4>
			</div>
			<div class="dropdown mb-3 show">
				<button type="button" class="btn btn-warning btn-fill btn-sm pull-right" onclick="history.back();"><i class="fa fa-chevron-circle-left"></i> Back</button>
			</div>
		</div>
	</div>
	<!-- Isi Kodingan -->

	<div class="row">
		<div class="col-md-4">
			<div class="card">
				<div class="card-header">
					<h3>Form Upload Bukti</h3>
					

					<!-- start -->
					<div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="staticBackdropLabel">Info Cara Pembayaran</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									@foreach($list_penyewaan as $k)
									<div class="card">
										<div class="card-body bg-primary shadow" style="border-radius: 10px">
											<div class=" align-items-center">
												<div class="media-body">
													<h5 class="text-white">Nomor Pembayaran :</h5>
													<h2 class="title text-white">{{$k->nomor_transaksi}}</h2>
													<b class="text-white">An. {{strtoupper($k->an)}}</b>
													<div class="row">
														<div class="col-md-8">
															<p class="text-white">Jumlah Harus Dibayar</p> 
														</div>
														<div class="col-md-4">
															<b class="text-white" style="float: right;">Rp. {{number_format($k->tharga)}}</b>
														</div>
													</div>
													
												</div>
											</div>
										</div>
										<ol class="fs-14 card card-body mt-3 shadow">
											<li class="pt-2"><b>Petunjuk Pembayaran :</b></li>
											<li class="pt-2">1. Sampaikan kepada kasir bahwa anda ingin melakukan pembayaran terhadap akun yang bernama <b>{{strtoupper($k->an)}}</b> dengan nomor pembayaran  <b>{{$k->nomor_transaksi}}</b></li>
											<li class="pt-2">2. Jika anda menggunakan smartphone, silahkan pilih menu Transfer/Pembayaran ke pembayaran <b>{{strtoupper($k->nama_transaksi)}}.</b> </li>
											<li class="pt-2">3. Lakukan pembayaran dengan jumlah <b>Rp. {{number_format($k->tharga)}}</b>, untuk penggunaan Non admin, Harga bisa berubah tergantung metode pembayaran yang dipilih.</li>
											<li class="pt-2">4. Setelah transaksi berhasil kamu akan mendapatkan bukti pembayaran dari kasi (Admin), silahkan foto dan upload gambar tersebut ke form dibawah ini.</li>
											<li class="pt-2">5. Untuk penggunaan smartphon, silahkan Scranshoot bukti pembayaran dan upload ke form ini juga</li>
											<li class="pt-2">6. Mohon simpan bukti pembayaran untuk sebagai jaminan jika terjadi suatu kesalahan dan membutuhkan verifikasi.</li>
											<li class="pt-2">7. Silahkan tunggu hingga proses bokinganmu disetujui oleh admin, jika belum disetujui pada Tanggal {{$k->tgl}}, silahkan hubungi kontak admin gedung</li>
										</ol>
									</div>
									@endforeach
								</div>
							</div>
						</div>
					</div>

					<!-- end -->
				</div>
				<div class="card-body">
					<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#staticBackdrop"><i class="fa fa-question-circle" aria-hidden="true"></i> Info Cara Pembayaran</button>
					<form class="form-valide mt-3" action="{{url('pembayaran/update', $penyewa->id)}}" method="post" enctype="multipart/form-data">
						@csrf
						@method('PUT')
						<div class="form-group">
							<input class="form-control shadow" type="file" name="foto" accept="image/*" required=""></input>
						</div>
						<button class="btn btn-primary btn-block"><i class="fa fa-save"></i> Upload</button>

					</form>
					<div class="pt-3">
						<img src="{{url('public')}}/{{$penyewa->foto}}" width="100%" height="300px" alt="Belum Melakukan Pembayaran" onerror="this.style.display='none' ">
					</div>

				</div>
			</div>
		</div>
		<div class="col-md-8">
			<div class="card ">
				@foreach($list_penyewaan as $k)
				<div class="card-body bg-primary shadow" style="border-radius: 10px">
					<div class=" align-items-center">
						<div class="media-body">
							<h4 class="text-white">Total Bayar</h4>
						
							<h2 class="title text-white">Rp. {{number_format($k->tharga)}}</h2>
						</div>
					</div>
				</div>
				<div class="card-body">
					<table class="table table-hover">
						<tr class="bg-dark">
							<td colspan="2"><b>Detail Pesanan</b></td>
						</tr>

						<tr>
							<th>Nama Gedung</th>
							<td>: {{ucwords($k->nama_gedung)}}</td>
						</tr>
						<tr>
							<th>Kode Boking</th>
							<td>: {{strtoupper($k->kode_transaksi)}}</td>
						</tr>
						<tr>
							<th>Nama Penyewa</th>
							<td>: {{ucwords($k->nama_penyewa)}}</td>
						</tr>
						<tr>
							<th>Metode Pembayaran</th>
							<td>: {{ucwords($k->nama_transaksi)}}</td>
						</tr>
						<tr>
							<th>Akun Penerima </th>
							<td>: {{strtoupper($k->an)}}</td>
						</tr>
						<tr>
							<th>Nomor Pembayaran </th>
							<td>: {{strtoupper($k->nomor_transaksi)}}</td>
						</tr>

						<tr>
							<th>Tgl/Jam Main </th>
							<td>: {{$k->tgl}} Jam {{$k->jam}} WIB</td>
						</tr>

						<tr>
							<th>Lama Boking </th>
							<td>: {{strtoupper($k->lama)}} Jam</td>
						</tr>
						@endforeach
					</table>
				</div>
			</div>

		</div>
		
	</div>




	<!-- <div class="card">
		<div class="shadow card-body pt-5 pb-0">
			<div class="form-validation">
				<div class="card-body">
					<div class="row">
						<div class="col-md-6">
							<table class="table table-datatable table-hover">
								<tr>
									<th>Kode Boking</th>
									<td> : {{strtoupper($penyewa->kode_transaksi)}}</td>
								</tr>
								<tr>
									<th>Nama Pemboking</th>
									<td> : {{ucwords($penyewa->an)}}</td>
								</tr>
								<tr>
									<th>Tanggal/Jam Main</th>
									<td> : {{$penyewa->tgl}}/{{$penyewa->jam}}</td>
								</tr>
								<tr>
									<th>Lama Sewa</th>
									<td> : {{$penyewa->lama}} Jam</td>
								</tr>
							</table> <hr>
						</div>
						<div class="col-md-6">
							<form class="form-valide" action="{{url('pembayaran/update', $penyewa->id)}}" method="post" enctype="multipart/form-data">
								@csrf
								@method('PUT')
								<h3 class="text-center">Upload Bukti Pembayaran</h3>
								<div class="form-group">
								<input class="form-control shadow" type="file" name="foto" accept="image/*" required=""></input>
								</div>
								<button class="btn btn-primary btn-block"><i class="fa fa-save"></i> Simpan</button>

							</form>
						</div>
					</div>
				<div class="row pt-5">
					<div class="col-md-12">
						<h2>Bukti Pembayaran</h2> <hr>
						<img src="{{url('public')}}/{{$penyewa->foto}}" width="50%" height="300px" alt="Belum Melakukan Pembayaran" onerror="this.style.display='none' ">

					</div>
				</div>

				</div>



			</div>

		</div>
	</div> -->
</div>
@endsection