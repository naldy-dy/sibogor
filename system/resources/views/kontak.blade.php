@extends('section.base')
@section('content')
<section class="py-lg-5 pt-5">
    <div class="container pt-6">
      <div class="row">
        <div class="col">
          <div class="card box-shadow-xl overflow-hidden mb-5">
            <div class="row">
              <div class="col-lg-5 position-relative bg-cover px-0"  style="background-image: url({{url('public/assets-user/img/wall.jpg')}})" loading="lazy">
                <div class="z-index-2 text-center d-flex h-100 w-100 d-flex m-auto justify-content-center">
                  <div class="mask bg-gradient-info opacity-8"></div>
                  <div class="p-5 ps-sm-8 position-relative text-start my-auto z-index-2">
                    <h3 class="text-white">Infromasi Kontak</h3>
                    <p class="text-white opacity-8 mb-4">Isi form disamping untuk menyampaikan kritik dan saran, kritak dan saran anda akan kami respon 24/7 Jam.</p>
                    <div class="d-flex p-2 text-white">
                      <div>
                        <i class="fas fa-phone text-sm"></i>
                      </div>
                      <div class="ps-3">
                        <span class="text-sm opacity-8">(+62) 81240515616</span>
                      </div>
                    </div>
                    <div class="d-flex p-2 text-white">
                      <div>
                        <i class="fas fa-envelope text-sm"></i>
                      </div>
                      <div class="ps-3">
                        <span class="text-sm opacity-8">Akunaku08022001@gmail.com</span>
                      </div>
                    </div>
                    <div class="d-flex p-2 text-white">
                      <div>
                        <i class="fas fa-map-marker-alt text-sm"></i>
                      </div>
                      <div class="ps-3">
                        <span class="text-sm opacity-8">Jl. Tanah Merah, No 108, Sukadana, Kayong Utara, Kalbar</span>
                      </div>
                    </div>
                    <div class="mt-4">
                      <button type="button" class="btn btn-icon-only btn-link text-white btn-lg mb-0" data-toggle="tooltip" data-placement="bottom" data-original-title="Log in with Facebook">
                        <i class="fab fa-facebook"></i>
                      </button>
                      <button type="button" class="btn btn-icon-only btn-link text-white btn-lg mb-0" data-toggle="tooltip" data-placement="bottom" data-original-title="Log in with Twitter">
                        <i class="fab fa-twitter"></i>
                      </button>
                      </button>
                      <button type="button" class="btn btn-icon-only btn-link text-white btn-lg mb-0" data-toggle="tooltip" data-placement="bottom" data-original-title="Log in with Instagram">
                        <i class="fab fa-instagram"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-7">
                <form class="p-3" id="contact-form" action="{{url('kritik')}}" method="post">
                  @csrf
                  <div class="card-header px-4 py-sm-5 py-3">
                    <h2>Kritik & Saran</h2>
                    <p class="lead"> Masukan Kritik dan saran anda.</p>
                  </div>
                  @include('admin.utils.notif')
                  <div class="card-body pt-1">
                    <div class="row">
                      <div class="col-md-12 pe-2 mb-3">
                        <div class="input-group  mb-4">
                          <input type="text" class="form-control shadow" placeholder="Nama Lengkap" name="nama" required="">
                        </div>
                      </div>
                      <div class="col-md-12 pe-2 mb-3">
                        <div class="input-group mb-4">
                
                          <input type="email" class="form-control shadow" placeholder="Email Aktif" name="email" required="">
                        </div>
                      </div>
                      <div class="col-md-12 pe-2 mb-3">
                        <div class="input-group mb-4">
                         
                          <textarea class="form-control shadow" id="message" rows="6" name="pesan" required="" placeholder="Masukan anda akan kami terima dengan senang hati..."></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 text-end ms-auto">
                        <button class="btn btn-info mb-0" onclick="return confirm('Lanjutkan kirim kritik dan saran?')"><i class="fa fa-paper-plane " ></i> Kirim Kritik & Saran</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection