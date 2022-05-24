<div class="nav-header">
    <a href="{{url('/')}}" class="brand-logo">
        <img class="logo-abbr" src="{{url('public')}}/assets/images/logo.png" alt="">
        <img class="logo-compact" src="{{url('public')}}/assets/images/logo-text.png" alt="">
        <img class="brand-title" src="{{url('public')}}/assets/images/logo-text.png" alt="">
    </a>

    <div class="nav-control">
        <div class="hamburger">
            <span class="line"></span><span class="line"></span><span class="line"></span>
        </div>
    </div>
</div>
<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">
            <li><a class="" href="{{url('sub-admin')}}/beranda">
               <i class="flaticon-381-networking"></i>
               <span class="nav-text">Beranda</span>
           </a>
       </li>
       <li><a class="" href="{{url('sub-admin')}}/gedung">
               <i class="fa fa-building"></i>
               <span class="nav-text">Gedung OlahRaga</span>
           </a>
       </li>
<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
   <i class="flaticon-381-controls-3"></i>
   <span class="nav-text">Transaksi</span>
</a>
<ul aria-expanded="false">
    <li><a href="{{url('sub-admin')}}/transaksi">Metode Pembayaran</a></li>
    <li><a href="{{url('sub-admin/history')}}">History Pembayaran</a></li>
</ul>
</li>
<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
   <i class="fa fa-user"></i>
   <span class="nav-text">Pengguna</span>
</a>
<ul aria-expanded="false">
    <li><a href="{{url('sub-admin')}}/user/admin">Admin Gor</a></li>
    <li><a href="{{url('sub-admin')}}/user/user">User</a></li>
    <li><a href="{{url('sub-admin')}}/user/all">Semua</a></li>

</ul>
</li>
<li><a href="{{url('sub-admin')}}/kecamatan" class="ai-icon" aria-expanded="false">
   <i class="fa fa-map"></i>
   <span class="nav-text">Kecamatan</span>
</a>
</li>
<li><a href="{{url('sub-admin')}}/kategori" class="ai-icon" aria-expanded="false">
   <i class="fa fa-university"></i>
   <span class="nav-text">Kategori Gedung</span>
</a>
</li>
<li><a href="{{url('sub-admin')}}/kritik" class="ai-icon" aria-expanded="false">
   <i class="fa fa-envelope" aria-hidden="true"></i>
   <span class="nav-text">Kritik & Saran</span>
</a>
</li>
<li><a href="{{url('sub-admin')}}/profil" class="ai-icon" aria-expanded="false">
   <i class="fa fa-user"></i>
   <span class="nav-text">Profil</span>
</a>
</li>

</ul>
</div>
</div>