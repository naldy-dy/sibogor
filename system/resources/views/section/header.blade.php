

  <header class="min-vh-75 relative img-fluid" id="carouselExampleIndicators" style="background-image: url('{{url('public')}}/assets-user/img/wall.jpg'); background-repeat: no-repeat; margin-top: auto;">

     <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <span class="mask"></span>
          <div class="container pt-6">
            <div class="row pt-6">
              <div class="col-lg-7 text-center mx-auto">
                @include('admin.utils.notif')
                <h1 class="text-white pt-3">CARI GEDUNG OLAHRAGA FAVORITMU DI SINI</h1>
                <a href="{{url('maps')}}" class="btn btn-warning shadow-sm fs-16" style="font-weight: 600;color: #444444;"><i class=" fa fa-search"></i> Cari Gedung</a>
              </div>
            </div>
          </div>
        </div>

        <div class="carousel-item header-2 min-vh-75  relative" id="carouselExampleIndicators" style="background-image: url('{{url('public')}}/assets-user/img/wall3.jpg');background-size: cover; border-radius: 0.0.10.10 px">
           <span class="mask"></span>
          <div class="container pt-6">
            <div class="row pt-6">
               <div class="col-lg-7 pt-6 text-center mx-auto">
                <h1 class="text-white pt-3 mt-n5">Sudah Memesan? Cek Pesanan dan Pembayaran</h1>
                <a href="{{url('pembayaran')}}" class="btn btn-warning shadow-sm fs-16" style="font-weight: 600;color: #444444;"><i class=" fa fa-ticket"></i> Cek Pesananmu Disini</a>
              </div>
            </div>
          </div>
        </div>

        <div class="carousel-item header-2 min-vh-75 relative " id="carouselExampleIndicators" style="background-image: url('{{url('public')}}/assets-user/img/wall2.jpg'); background-size: cover; border-radius: 0.0.10.10 px">
           <span class="mask"></span>
          <div class="container pt-6">
            <div class="row pt-6">
              <div class="col-lg-7 pt-6 text-center mx-auto">
                <h1 class="text-white pt-3 mt-n5">Kontak Admin?</h1>
                <a href="{{url('kontak')}}" class="btn btn-warning shadow-sm fs-16" style="font-weight: 600;color: #444444;"><i class=" fa fa-envelope-o "></i> Disini</a>
              </div>
            </div>
          </div>
       </div>

     </div>
     <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </button>
  </div>

</div>
</header>
