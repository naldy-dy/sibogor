<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="{{url('public')}}/assets-user/css/nucleo-icons.css" rel="stylesheet" />
  <link href="{{url('public')}}/assets-user/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="{{url('public')}}/assets-user/css/material-kit.css?v=3.0.0" rel="stylesheet" />

  <!-- css admin -->
  <link rel="icon" type="image/png" sizes="16x16" href="{{url('public')}}/assets/images/favicon.png">
  <link rel="stylesheet" href="./vendor/chartist/css/chartist.min.css">
  <link href="{{url('public')}}/assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
  <link href="{{url('public')}}/assets/vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
  <link href="{{url('public')}}/assets/css/style.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">


  <!-- leaftlet -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
  integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
  crossorigin=""/>
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
  integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
  crossorigin=""></script>

  <!-- font poppins -->

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">


  <!-- caorasell bootstrap -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>

  <!-- notif -->
  <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
  <script>
    window.OneSignal = window.OneSignal || [];
    OneSignal.push(function() {
      OneSignal.init({
        appId: "966517a0-5ea3-4bea-89ee-525a95a3ded2",
        safari_web_id: "",
        notifyButton: {
          enable: true,
        },
        allowLocalhostAsSecureOrigin: true,
      });
    });
  </script>
</head>

<style>
  .divider:after,
  .divider:before {
    content: "";
    flex: 1;
    height: 1px;
    background: #eee;
  }

  #msform {
    text-align: center;
    position: relative;
    margin-top: 20px
  }

  #progressbar {
    margin-bottom: 30px;
    overflow: hidden;
    color: lightgrey
  }

  #progressbar .active {
    color: #1BC4CA
  }

  #progressbar li {
    list-style-type: none;
    font-size: 12px;
    width: 25%;
    float: left;
    position: relative
  }

  #progressbar #account:before {
    font-family: FontAwesome;
    content: "\f023"
  }

  #progressbar #personal:before {
    font-family: FontAwesome;
    content: "\f007"
  }

  #progressbar #payment:before {
    font-family: FontAwesome;
    content: "\f09d"
  }

  #progressbar #confirm:before {
    font-family: FontAwesome;
    content: "\f00c"
  }

  #progressbar li:before {
    width: 50px;
    height: 50px;
    line-height: 45px;
    display: block;
    font-size: 18px;
    color: #ffffff;
    background: lightgray;
    border-radius: 50%;
    margin: 0 auto 10px auto;
    padding: 2px
  }

  #progressbar li:after {
    content: '';
    width: 100%;
    height: 2px;
    background: lightgray;
    position: absolute;
    left: 0;
    top: 25px;
    z-index: -1
  }

  #progressbar li.active:before,
  #progressbar li.active:after {
    background: skyblue
  }

  #msform fieldset .form-card {
    background: white;
    border: 0 none;
    border-radius: 0px;
    box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
    padding: 20px 40px 30px 40px;
    box-sizing: border-box;
    width: 94%;
    margin: 0 3% 20px 3%;
    position: relative
  }

  #msform fieldset {
    background: white;
    border: 0 none;
    border-radius: 0.5rem;
    box-sizing: border-box;
    width: 100%;
    margin: 0;
    padding-bottom: 20px;
    position: relative
  }

  #msform fieldset:not(:first-of-type) {
    display: none
  }

  #msform fieldset .form-card {
    text-align: left;
    color: #9E9E9E
  }

  .radio-group {
    position: relative;
    margin-bottom: 25px;
    display: flex;
    justify-content: center;
  }
  .group-radio{
    margin: 0 6px;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.30);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    color: #aaaaaa;
    width: 150px;
    height: 150px;
    position: relative;
  }
  .group-radio i{
    display: block;
    font-size: 50px;
    margin: 0;
    padding: 0;
  }
  .group-radio span{
    display: block;
    font-size: 16px;
    margin: 0;
    padding: 0;
  }

  .group-radio input[type="radio"]{
    position: absolute;
    width: 100%;
    height: 100%;
    left: 0;
    top: 0;
    opacity: 0;
    cursor: pointer;
  }
  .group-radio input[type="radio"]:checked ~ i{
   color: #1BC4CA;
 }
</style>
<body>
  <section class="vh-100">
    <div class="container py-5 h-100">
      <div class="row d-flex align-items-center justify-content-center">
        <div class="col-md-8 col-lg-7 col-xl-6">
          <img src="{{url('public')}}/assets-user/img/regis.png" class="img-fluid" alt="Phone image" width="100%">
        </div>
        <div class="col-md-7 animated fadeInDown card card-body shadow col-lg-5 col-xl-5 offset-xl-1">
          <div class="divider d-flex align-items-center my-4">
            <h3 class="text-center fw-bold mx-3 mb-0 text-muted">Daftar</h3>
          </div>

          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif
          @include('sub-admin.utils.notif')
          
          <form id="msform" action="{{url('daftar')}}" method="post">
            @csrf
            <div class="">
             <!-- progressbar -->
             <ul id="progressbar">
              <li class="active" id="account"><strong>Account</strong></li>
              <li id="personal"><strong>Personal</strong></li>
              <li id="payment"><strong>Profil</strong></li>
              <li id="confirm"><strong>Finish</strong></li>
            </ul> <!-- fieldsets -->

            <fieldset>
              <div class="card">
                <h2 class="fs-title">Daftar Sebagai</h2>
                <div class="radio-group">
                  <div class="group-radio shadow" title="Note :Daftar sebagai user adalah dimana anda hanya bisa mencari dan memesan gedung yang telah disediakan oleh admin gedung">
                    <input type="radio" name="level" value="1" checked>
                    <i class="fa fa-user"></i>
                    <strong>User</strong>
                  </div>
                  <div class="group-radio shadow" title="Note :Untuk daftar menjadi admin, anda harus memiliki gedung yang ingin anda sewakan, jika anda memiliki gedung untuk mencari penghasilan tambahan silahkan daftarkan gedung anda disini sebagai admin">
                    <input type="radio" name="level" value="2" required>
                    <i class="fa fa-users"></i>
                    <strong>Admin</strong>
                  </div>
                </div>

              </div>
              <a href="{{url('login')}}" class="btn btn-info" style="background-color: #0D898D" onclick=" return confirm('Yakin keluar dari halaman Daftar?')"><i class="fa fa-arrow-left"></i> Masuk</a>
              <button class="btn btn-info next" >Lanjut <i class="fa fa-arrow-right"></i></button>

              <!-- <input type="button" name="make_payment" class="next action-button" value="Confirm" /> -->
            </fieldset>
            <fieldset>
              <div class="card-body">
                <h2 class="mb-3">Account Information</h2>
                <input type="text" required class="form-control mb-3 shadow" name="nama" value="{{ old('nama') }}" placeholder="Nama Lengkap">
                <input type="email" required class="form-control mb-3 shadow" value="{{ old('email') }}" name="email" placeholder="Email Aktif">
                <input type="text" required class="form-control mb-3 shadow" name="notlp" value="{{ old('notlp') }}" placeholder="Nomor Hp/WA">
                <input type="password" required class="form-control mb-3 shadow" name="password" placeholder="New Password" />
              </div>
              
              <button type="button" name="previous" style="background-color: #0D898D" class="previous btn btn-info action-button-previous" value="Previous" /><i class="fa fa-arrow-left"></i> </button>

              <button class="btn btn-info next"> <i class="fa fa-arrow-right"></i></button>
            </fieldset>

            <fieldset>
              <div class="card-body">
                <h2 class="mb-3">Foto Profil</h2>
                <div id="imagePreview1"></div>
                <input type="file" name="foto" class="form-control mt-3 shadow" style="margin-bottom: 10px;" id="file1" onchange="return fileValidation()" accept="image/*" required>                               
              </div>

              <button type="button" name="previous" style="background-color: #0D898D" class="previous btn action-button-previous btn-info" value="Previous" /><i class="fa fa-arrow-left"></i> </button>

              <button class="btn btn-info" onclick=" return confirm('Pastikan data terisi semua, jika proses tidak ada tindakan silahkan cek form sebelumnya !!')"><i class="fa fa-arrow-right"></i></button>
              <!-- <input type="submit" name="next" class="next btn btn-primary action-button" value="Lanjutkan Daftar"> -->
            </fieldset>

            <fieldset>
              <h2 class="fs-title text-center">Success !</h2> <br><br>
              <div class="row justify-content-center">
                <div class="col-3"> <img src="https://img.icons8.com/color/96/000000/ok--v2.png" class="fit-image"> </div>
              </div> <br><br>
              <div class="row justify-content-center">
                <div class="col-7 text-center">
                  <h5>You Have Successfully Signed Up</h5>
                </div>
              </div>
            </fieldset>


          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  $(document).ready(function(){

var current_fs, next_fs, previous_fs; //fieldsets
var opacity;

$(".next").click(function(){

  current_fs = $(this).parent();
  next_fs = $(this).parent().next();

//Add Class Active
$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

//show the next fieldset
next_fs.show();
//hide the current fieldset with style
current_fs.animate({opacity: 0}, {
  step: function(now) {
// for making fielset appear animation
opacity = 1 - now;

current_fs.css({
  'display': 'none',
  'position': 'relative'
});
next_fs.css({'opacity': opacity});
},
duration: 600
});
});

$(".previous").click(function(){

  current_fs = $(this).parent();
  previous_fs = $(this).parent().prev();

//Remove class active
$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

//show the previous fieldset
previous_fs.show();

//hide the current fieldset with style
current_fs.animate({opacity: 0}, {
  step: function(now) {
// for making fielset appear animation
opacity = 1 - now;

current_fs.css({
  'display': 'none',
  'position': 'relative'
});
previous_fs.css({'opacity': opacity});
},
duration: 600
});
});

$('.radio-group .radio').click(function(){
  $(this).parent().find('.radio').removeClass('selected');
  $(this).addClass('selected');
});

$(".submit").click(function(){
  return false;
})

});
</script>


<script>
  function fileValidation(){
    var fileInput = document.getElementById('file1');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
        //Image preview
        if (fileInput.files && fileInput.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
            document.getElementById('imagePreview1').innerHTML = '<img src="'+e.target.result+'" class="shadow" style="width:50%; border-radius:10px;"/>';
          };
          reader.readAsDataURL(fileInput.files[0]);
        }
      }
    </script>
  </body>
  </html>