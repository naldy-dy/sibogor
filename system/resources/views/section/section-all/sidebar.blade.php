@if(Auth::user()->level == 1)
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
      <li><a href="{{url('pembayaran')}}" class="ai-icon" aria-expanded="false">
       <i class="fa fa-ticket"></i>
       <span class="nav-text">Bokinganmu</span>
     </a>
   </li>
    <li><a href="{{url('user/history')}}" class="ai-icon" aria-expanded="false">
       <i class="fa fa-history"></i>
       <span class="nav-text">History Pembokingan</span>
     </a>
   </li>
   <li><a href="{{url('user/profil')}}" class="ai-icon" aria-expanded="false">
     <i class="fa fa-user"></i>
     <span class="nav-text">Profil</span>
   </a>
 </li>

</ul>
</div>
</div>

@elseif(Auth::user()->level == 2)
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
            <li><a href="{{url('admin')}}/beranda" class="ai-icon" aria-expanded="false">
               <i class="fa fa-tachometer"></i>
               <span class="nav-text">Beranda</span>
           </a>
       </li>

        <li><a href="{{url('admin')}}/penyewaan" class="ai-icon" aria-expanded="false">
             <i class="flaticon-381-settings-2"></i>
                <span class="nav-text">Penyewaan</span>
            </a>
        </li>
        <li><a href="{{url('admin')}}/gedung" class="ai-icon" aria-expanded="false">
                <i class="fa fa-university"></i>
                   <span class="nav-text">Gedung Anda</span>
               </a>
        </li>
           <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
               <i class="flaticon-381-networking"></i>
               <span class="nav-text">Transaksi</span>
           </a>
           <ul aria-expanded="false">
               <li><a href="{{url('admin/transaksi')}}">Metode Pembayaran</a></li>
               <li><a href="{{url('admin/history')}}">History Pemesanan</a></li>
           </ul>
        </li>
        <li>
            <a href="{{url('admin')}}/galeri" class="ai-icon" aria-expanded="false">
                <i class="fa fa-photo"></i>
                   <span class="nav-text">Galery</span>
               </a>
        </li>
        <li>
            <a href="{{url('admin/profil')}}" class="ai-icon" aria-expanded="false">
                <i class="fa fa-user"></i>
                   <span class="nav-text">Profil</span>
               </a>
        </li>
</ul>
</div>
</div>

@else

@endif