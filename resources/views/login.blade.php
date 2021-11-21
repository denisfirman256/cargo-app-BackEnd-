<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>CARGO APP | LOGIN PAGE</title>

  {{-- Font Montserrat --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  {{-- /Font Montserrat --}}

  {{-- css --}}
  <link rel="stylesheet" href="{{ asset('libraries/css/costum.css') }}">
  {{-- /css --}}

  {{-- bootstrap --}}
  <link rel="stylesheet" href="{{ asset('libraries/bootstrap/css/bootstrap.min.css') }}">
  {{-- /Bootstrap --}}

  {{-- Aos --}}
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  {{-- /aos --}}

  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
  {{-- LOGIN SECTION --}}
  <div id="app">
    <router-view></router-view>
  </div>
  {{-- /LOGIN SECTION/ --}}
  
  
  <script src="{{ asset('js/app.js') }}"></script>
  {{-- jquery --}}
  <script src="{{ asset('libraries/jquery/jquery-3.6.0.min.js') }}"></script>
  {{-- bootstrap js --}}
  <script src="{{ asset('libraries/bootstrap/js/bootstrap.min.js') }}"></script>
  {{-- AOS Animated --}}
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

  <script>
    AOS.init();
  </script>

  <script>
    $('.dropdown-toggle').dropdown();
  </script>



</body>
</html>