<style>
  .active{
    color: #1BC4CA;
  }
</style>
@php
function checkRouteActive($route){
if(Route::current()->uri == $route) return 'active';
}
@endphp

<nav class="navbar fixed-top navbar-expand-lg blur border-radius-xl top-0 z-index-fixed shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
  <div class="container-fluid px-0">
    <a class="navbar-brand font-weight-bolder ms-sm-3" href="{{url('/')}}" rel="tooltip" title="Designed and Coded by Creative Tim" data-placement="bottom" target="_blank">
     <img src="{{url('public')}}/assets/images/logo-text.png" width="150px">
   </a>
   <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon mt-2">
      <span class="navbar-toggler-bar bar1"></span>
      <span class="navbar-toggler-bar bar2"></span>
      <span class="navbar-toggler-bar bar3"></span>
    </span>
  </button>
  <div class="collapse navbar-collapse pt-3 pb-2 py-lg-0 w-100" id="navigation">
    <ul class="navbar-nav navbar-nav-hover mx-auto">

      <li class="nav-item ms-lg-auto">
        <a class="nav-link nav-link-icon me-2 " href="{{url('/')}}">
          <p class="d-inline text-sm z-index-1 font-weight-bold {{checkRouteActive('/')}}" data-bs-toggle="tooltip"  data-bs-placement="bottom" title="Beranda">Beranda</p>
        </a>
      </li>

      <li class="nav-item ms-lg-auto">
        <a class="nav-link nav-link-icon me-2" href="{{url('maps')}}" >
          <p class="d-inline text-sm z-index-1 {{checkRouteActive('maps')}} {{checkRouteActive('cari')}} {{checkRouteActive('filter')}} {{checkRouteActive('filter-kategori')}} {{checkRouteActive('detail/{gedung}')}} {{checkRouteActive('form-boking/{gedung}',)}} font-weight-bold" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Cari Gedung">Cari Gedung</p>
        </a>
      </li>
      <li class="nav-item ms-lg-auto">
        <a class="nav-link nav-link-icon me-2" href="{{url('berita')}}" >
          <p class="d-inline text-sm z-index-1 {{checkRouteActive('berita')}} {{checkRouteActive('berita/baca/{berita}')}}  font-weight-bold" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Berita">SportLight</p>
        </a>
      </li>

      <li class="nav-item ms-lg-auto">
        <a class="nav-link nav-link-icon me-2 " href="{{url('kontak')}}" >
          <p class="d-inline text-sm z-index-1 {{checkRouteActive('kontak')}} font-weight-bold" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Kontak Kami">Kontak Kami</p>
        </a>
      </li>

      <li class="nav-item ms-lg-auto">
        <a class="nav-link nav-link-icon me-2 " href="{{url('kontak')}}" >
          <div class="theme-switch-wrapper">
            <label class="theme-switch" for="checkbox">
              <input type="checkbox" id="checkbox" />
              <div class="slider round"></div>
            </label>
            <label style="margin-left: 10px;">Dark Mode</label>
          </div>
        </a>
      </li>
      
    </ul>
    <ul>
      <li class="nav-item dropdown dropdown-hover ms-auto">
        <a class=" ps-2 d-flex cursor-pointer font-weight-bold mr-3 pr-3 align-items-center" id="dropdownMenuPages" data-bs-toggle="dropdown" aria-expanded="false">
         @if(Auth::check())
         {{ucwords(Auth::user()->nama)}} 
         <img src="{{url("public")}}/{{Auth::user()->foto}}" width="40" style="border-radius:50%; margin-left:10px" alt=""/>

         
       </a>
       <div class="dropdown-menu dropdown-menu-animation ms-n3 dropdown-md p-3 border-radius-xl mt-0 mt-lg-3" aria-labelledby="dropdownMenuPages">
        <div class="d-none d-lg-block">
          <h6 class="dropdown-header text-dark font-weight-bolder d-flex align-items-center px-1">
            Dashboard
          </h6>
          @if(Auth::user()->level == "1")
          <a href="{{url('pembayaran')}}" class="dropdown-item border-radius-md">
            <span>Masuk Dashboard</span>
          </a>
          @elseif(Auth::guard('subadmin'))
          <a href="{{url('sub-admin/beranda')}}" class="dropdown-item border-radius-md">
            <span>Masuk Dashboard</span>
          </a>
          @else(Auth::user()->level == "2")
          <a href="{{url('admin/beranda')}}" class="dropdown-item border-radius-md">
            <span>Masuk Dashboard</span>
          </a>
          @endif
          <h6 class="dropdown-header text-dark font-weight-bolder d-flex align-items-center px-1 mt-3">
            Account
          </h6>
          <a href="{{url('logout')}}" class="dropdown-item border-radius-md">
            <span>Logout</span>
          </a>
        </div>

        <div class="d-lg-none">
          <h6 class="dropdown-header text-dark font-weight-bolder d-flex align-items-center px-1">
            Dashboard
          </h6>
          @if(Auth::user()->level == "1")
          <a href="{{url('pembayaran')}}" class="dropdown-item border-radius-md">
            <span>Masuk Dashboard</span>
          </a>
          @elseif(Auth::guard('subadmin'))
          <a href="{{url('sub-admin/beranda')}}" class="dropdown-item border-radius-md">
            <span>Masuk Dashboard</span>
          </a>
          @else(Auth::user()->level == "2")
          <a href="{{url('admin/beranda')}}" class="dropdown-item border-radius-md">
            <span>Masuk Dashboard</span>
          </a>
          @endif
        </a>
        
        <h6 class="dropdown-header text-dark font-weight-bolder d-flex align-items-center px-1 mt-3">
          Account
        </h6>
        <a href="{{url('logout')}}" class="dropdown-item border-radius-md">
          <span>Logout</span>
        </a>

      </div>
      @else
      <a href="{{url('login')}}" class="btn btn-sm mb-0 me-1 mt-2 mt-md-0"  style="background-color: #1BC4CA; color:#fff"> <b class="fa fa-key"></b> Masuk</a>
    @endif</strong></span>
  </div>
</li>
</ul>
</div>
</div>
</nav>