<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sumenep Blog</title>

   <!-- Favicon -->
    <link rel="icon" href="{{ asset('img/brand/logo-alton.png')}}" type="image/png">

   <!-- Ruang Admin  -->
   <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
   <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
   <link href="{{ asset('assets/css/ruang-admin.min.css')}}" rel="stylesheet">

   <script src="https://kit.fontawesome.com/d7e83bf142.js" crossorigin="anonymous"></script>

   <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

</head>
<body>

  @yield('main')

  <script src="{{ asset('assets/vendor/jquery/jquery.min.js')}} "></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}} "></script>
  <script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js')}} "></script>
  <script src="{{ asset('assets/js/ruang-admin.min.js')}} "></script>

</body>
</html>
