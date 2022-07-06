@extends('section.base')
@section('content')
<div class="container pt-6 mt-5">
	<div class="card mt-3 shadow blur">
		<div class="card-body">
			<h3 style="text-align:center" class="text-center">Form Pembokingan </h3> 
			<h4 class="text-center">{{strtoupper($gedung->nama)}}</h4>
			<p class="text-center fs-12">{{UCWORDS($gedung->alamat)}}/{{$gedung->np}}</p><hr>
			
		</div>
	</div>
</div>

<div class="container">
	<div class="card shadow blur">
		<div class="card-body">
			<h2 class="text-center mb-5 fs-20">------ ISI FORM DIBAWAH ------
			</h2> 
			<form action="{{url('form-boking/biodata')}}" method="post">
				@csrf
				<div class="row">
					<input type="hidden" value="{{$gedung->admin->notlp}}" name="admin">
					<div class="col-md-6 ">
						<h4>Biodata Pemesanan</h4>
						<div class="form-group">
							<input type="text" class="form-control" name="id_gedung" value="{{$gedung->id}}" hidden="" readonly="">
							<input type="text" class="form-control" name="id_user" value="{{$user->id}}" hidden="" readonly="">
							<input type="text" class="form-control" name="id_transaksi" value="{{$gedung->idt}}" hidden="" readonly="">
							<input type="text" class="form-control" name="id_admin" value="{{$gedung->id_admin}}" hidden="" readonly="">
							<input type="text" class="form-control" name="email" value="{{$user->email}}" hidden="" readonly="">
						</div>
						<div class="form-material pt-3">
							<div class="form-group">
								<label class="text-black">An Pemboking</label>
								<input type="" class="form-control shadow" placeholder="Nama Pemboking" required="" name="an" readonly="" value="{{ucwords($user->nama)}}">
							</div>

							<div class="row pt-3">
								<div class="col-md-12">
									<label class="text-black">Tanggal Boking</label>
									<input type="date" class="form-control shadow" placeholder="Nama Pemboking" value="{{$now}}" name="tanggal" required="" placeholder="{{$now}}">
								</div>
							</div>
							<div class="row pt-3">
								<div class="col-md-6">
									<label class="text-black">Jam Boking</label>
									<input type="time" class="form-control shadow" placeholder="Nama Pemboking" name="jam" value="{{$jam}}" required="">
								</div>
								<div class="col-md-6">
									<label class="text-black">Lama Boking(Jam)</label>
									<input type="number" class="form-control shadow" placeholder="Lama Main" min="1" value="1" name="lama" required="">
								</div>
							</div>
							<div class="form-group pt-3">
								<label class="text-black">Nomor Handphone</label>
								<input type="" class="form-control shadow" name="notlp" placeholder="No Handphone/WhatsApp" required="" value="{{$user->notlp}}">
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<h4>Pilih Metode Pembayaran</h4>
						<div class="form-group ml-3 pt-5">
							<label>Harga/Jam = Rp. {{number_format($gedung->harga)}}</label>
							<div class="radio">

								@foreach($list_transaksi as $transaksi)
								<label><input type="radio" name="id_pembayaran" required="" class="ml-3" value="{{$transaksi->id}}"> 
									<img src="{{url('public')}}/{{$transaksi->foto}}" width="80px">
								</label>
							
								@endforeach
							</div>
						</div>
						<button class="btn btn-warning shadow-lg btn-block font-w600" onclick="return confirm('Lanjutkan Pembayaran?')">Lanjutkan Pembayaran <i class="fa fa-arrow-right"></i></button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection