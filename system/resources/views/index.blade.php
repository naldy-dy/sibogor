@extends('section.base')
@section('content')

@include('section.header')


<div class="card card-body blur shadow-lg mx-3 mx-md-4 mt-n6">
  <section class="pt-3" >
    <div class="container">
      <div class="row">
        <div class="col-lg-9 mx-auto py-3">
          <div class="row">
            <div class="col-md-4 col-xs-4 position-relative">
              <div class="p-3 text-center">
                <h1 class="text-gradient text-primary"><span id="state1" countTo="{{$hitung_gedung}}">{{$hitung_gedung}}</span>+</h1>
                <h5 class="mt-3">Gedung Telah Ditambahkan</h5>

              </div>
              <hr class="vertical dark">
            </div>
            <div class="col-md-4 col-xs-4 position-relative">
              <div class="p-3 text-center">
                <h1 class="text-gradient text-primary"> <span id="state2" countTo="{{$hitung_user}}">{{$hitung_user}}</span>+</h1>
                <h5 class="mt-3">User Telah Bergabung</h5>

              </div>
              <hr class="vertical dark">
            </div>
            <div class="col-md-4 col-xs-4">
              <div class="p-3 text-center">
                <h1 class="text-gradient text-primary" id="state3" countTo="4">33x</h1>
                <h5 class="mt-3">Telah Di Boking</h5>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<div class="container">
  <div class="mt-5">
    <div class="row">


      <div class="col-md-12 col-sm-6 card shadow">

        <div class="card-body ">
          <div class="row">
           <center>
              <h1>Masukan Nama Gedung</h1>
           </center>
           <form action="{{url('cari')}}" method="post">
                @csrf
              <div class="input-group">
                <input type="text" name="nama" value="{{ old('nama')}}" class="form-control shadow form-control-sm blur shadow" style="border-color:blue " placeholder="Cari Gedung ..">
                <div class="input-group-append">
                  <button class="btn btn-info"><i class="fa fa-search"></i></button>
                </div>
              </div>
              </form>
             <center>
                <a href="{{url('maps')}}" class="btn btn-info" style="width: 130px"> Lihat Semua <br> <i class="fa fa-arrow-circle-down fa-2x"></i></a>
               
             </center>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
</div>

<div class="container">
  <div class=" mt-5 shadow">
    <div class="row">
      <div class=" card card-body shadow text-center pt-3">
        <h1>Keunggulan Kami</h1>
      </div>
      <div class="col-md-6 col-sm-6 card shadow" >

        <div class="card-body">
          <div class="row">
            <div class="col-md-4 col-4">
              <img src="{{url('public/assets/icon/simple-profile.png')}}" class="img-fluid" width="100%" alt="">
            </div>
            <div class="col-md-8 col-8">
              <b>Simpel Profil</b>
              <p>Memboking lebih cepat dengan mengisi form yang lebih sedikit dari aplikasi lainnya</p>
            </div>
          </div>
        </div>

      </div>
      <div class="col-md-6 col-sm-6 card shadow" >

        <div class="card-body">
          <div class="row">
            <div class="col-md-4 col-4">
              <img src="{{url('public/assets/icon/simple-reschedule.png')}}" width="100%" alt="">
            </div>
            <div class="col-md-8 col-8">
              <b>Simple Schedule</b>
              <p>Tanggal boking mudah dipilih, gak ribet dan langsung terboking</p> <br>
            </div>
          </div>
        </div>

      </div>

      <div class="col-md-6 card shadow" >

        <div class="card-body">
          <div class="row">
            <div class="col-md-4 col-4">
              <img src="{{url('public/assets/icon/mudah.png')}}" width="100%" alt="">
            </div>
            <div class="col-md-8 col-8">
              <b>Simple Booking Process</b>
              <p>Pemesanan tanpa ribet di mana pun dan kapan pun.</p> <br>
            </div>
          </div>
        </div>

      </div>


      <div class="col-md-6 card shadow" >

        <div class="card-body">
          <div class="row">
            <div class="col-md-4 col-4">
              <img src="{{url('public/assets/icon/simple-refund.png')}}" width="100%" alt="">
            </div>
            <div class="col-md-8 col-8">
              <b>Simple Refund</b>
              <p>Refund dengan mudah, hanya membawa handphone dan kode bokingan anda saya, uang kembali 100%</p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<section class="py-3">
  <div class="container card card-body shadow">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="mb-5">Berita Olahraga Terbaru <hr style="border-color: blue; "> </h1>  
      </div>
    </div>
    <div class="row">

@foreach($list_berita->sortByDesc('id')->take(3) as $b)
      <div class="col-lg-3 col-sm-6">
        <div class="card card-plain">
          <div class="card-header p-0 position-relative">
            <a class="d-block blur-shadow-image">
              <img src="{{url('public')}}/{{$b->foto}}" alt="img-blur-shadow" class="img-fluid shadow border-radius-lg" loading="lazy">
            </a>
          </div>
          <div class="card-body px-0">
            <h5>
              <a href="{{url('berita/baca',$b->id)}}" class="text-dark font-weight-bold">{{Str::limit(ucwords($b->judul),50)}}</a><br>
              <label for=""><i class="fa fa-clock"></i> {{$b->created_at}}</label>
            </h5>
            <p>
             {{ Str::limit($b->isi, 100) }}
            </p>
            <a href="{{url('berita/baca',$b->id)}}" class="text-info text-sm icon-move-right">Baca Selengkapnya
              <i class="fas fa-arrow-right text-xs ms-1"></i>
            </a>
          </div>
        </div>
      </div>
@endforeach
      <div class="col-lg-3 col-md-12 col-12">
        <div class="card card-blog card-background cursor-pointer">
          <div class="full-background"  style="background-image: url('{{url('public')}}/assets-user/img/wall.jpg')" loading="lazy"></div>
          <div class="card-body">
            <div class="content-left text-start my-auto py-4">
              <h2 class="card-title text-white">Ingin dapat berita lainnya?</h2>
              <p class="card-description text-white">Silahkan lihat form berita, tekan tombol dibawah</p>
              <a href="{{url('berita')}}" class="text-white text-sm icon-move-right">Lihat Lainnya
                <i class="fas fa-arrow-right text-xs ms-1"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
