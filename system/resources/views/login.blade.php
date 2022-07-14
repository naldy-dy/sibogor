<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>dd</title>
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
</style>
<body>
  <section class="vh-100">
    <div class="container py-5 h-100">
      <div class="row d-flex align-items-center justify-content-center h-100">
        <div class="col-md-8 col-lg-7 col-xl-6">
          <img src="{{url('public')}}/assets-user/img/login.png" class="img-fluid" alt="Phone image" width="100%">
        </div>
        <div class="col-md-7 animated fadeInDown card card-body shadow col-lg-5 col-xl-5 offset-xl-1">
          <div class="divider d-flex align-items-center my-4">
              <h3 class="text-center fw-bold mx-3 mb-0 text-muted">Masuk</h3>
            </div>


           @include('sub-admin.utils.notif')
          
          <form action="{{url('login')}}" method="post">
            @csrf
            <!-- Email input -->
            <div class="form-outline mb-4">
              <input type="email" name="email" value="{{old('email')}}" id="form1Example13" class="form-control shadow" placeholder="Email" required />
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
              <input type="password" name="password" id="form1Example23" class="form-control shadow" placeholder="Password"  required/>
            </div>

            <div class="d-flex justify-content-around align-items-center mb-4">
              <!-- Checkbox -->
              <div class="form-check">
                <input
                class="form-check-input"
                type="checkbox"
                value=""
                id="form1Example3"
                checked
                />
                <label class="form-check-label" for="form1Example3"> Remember me </label>
              </div>
              <a href="#!">Forgot password?</a>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-info btn-lg btn-block"  style="background-color: #1BC4CA">Masuk</button>

            <div class="divider d-flex align-items-center my-4">
              <p class="text-center fw-bold mx-3 mb-0 text-muted">Atau</p>
            </div>

            <a class="btn btn-danger btn-lg btn-block" style="background-color: #0D898D" href="{{url('daftar')}}" role="button">
        Daftar
            </a>
            <a href="{{url('lupa-passwords')}}" style="float: right">Lupa Password ?</a>

            </form>
          </div>
        </div>
      </div>
    </section>
  </body>
  </html>