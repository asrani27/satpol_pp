<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Satpol PP</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- site icon -->
      <link rel="icon" href="/pluto/images/fevicon.png" type="image/png" />
      <!-- bootstrap css -->
      <link rel="stylesheet" href="/pluto/css/bootstrap.min.css" />
      <!-- site css -->
      <link rel="stylesheet" href="/pluto/style.css" />
      <!-- responsive css -->
      <link rel="stylesheet" href="/pluto/css/responsive.css" />
      <!-- color css -->
      <link rel="stylesheet" href="/pluto/css/colors.css" />
      <!-- select bootstrap -->
      <link rel="stylesheet" href="/pluto/css/bootstrap-select.css" />
      <!-- scrollbar css -->
      <link rel="stylesheet" href="/pluto/css/perfect-scrollbar.css" />
      <!-- custom css -->
      <link rel="stylesheet" href="/pluto/css/custom.css" />
      <!-- calendar file css -->
      <link rel="stylesheet" href="/pluto/js/semantic.min.css" />
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
  <link rel="stylesheet" href="/notif/dist/css/iziToast.min.css">
  <script src="/notif/dist/js/iziToast.min.js" type="text/javascript"></script>
   </head>
   <body class="inner_page login" style="background-image: url('http://localhost:8000/logo/bg.jpeg'); background-size:cover">
      <div class="full_container">
         <div class="container">
            <div class="center verticle_center full_height">
               <div class="login_section" style="min-height: 100px;">
                  <div class="logo_login">
                     <div class="center">
                      <h1 style="color:aliceblue; font-size:26px; text-align:center">SATPOL PP <br/> KABUPATEN HULU SUNGAI UTARA</h1>
                     </div>
                  </div>
                  <div class="login_form">
                    <form method="post" action="/login">
                      @csrf
                        <fieldset>
                           <div class="field">
                              <label class="label_field">Username</label>
                              <input type="username" class="form-control" placeholder="username" name="username" value="{{old('username')}}" autocomplete="new-password" />
                           </div>
                           <div class="field">
                              <label class="label_field">Password</label>
                              <input type="password" class="form-control" placeholder="Password" name="password" value="{{old('password')}}" autocomplete="new-password" />
                           </div>
                           <div class="field margin_0">
                              <label class="label_field hidden">hidden label</label>
                              <button class="main_bt">Log In</button>
                           </div>
                        </fieldset>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- jQuery -->
      <script src="/pluto/js/jquery.min.js"></script>
      <script src="/pluto/js/popper.min.js"></script>
      <script src="/pluto/js/bootstrap.min.js"></script>
      <!-- wow animation -->
      <script src="/pluto/js/animate.js"></script>
      <!-- select country -->
      <script src="/pluto/js/bootstrap-select.js"></script>
      <!-- nice scrollbar -->
      <script src="/pluto/js/perfect-scrollbar.min.js"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- custom js -->
      <script src="/pluto/js/custom.js"></script>
      <script type="text/javascript">
        @include('layouts.notif')
        </script>
   </body>
</html>
