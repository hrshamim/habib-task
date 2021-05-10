<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title> Habib Task </title>
 
  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}"/>  
  <!-- Template Main CSS File -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}"/>    
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
      <h1 class="logo mr-auto"><a href="{{ url('/') }}">Lolita Astrologist </a></h1>
      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li><a href="{{ url('/') }}"> Generate New Horoscopes</a></li>
          <li><a href="{{ url('horoscopes') }}"> Horoscopes Calendar</a></li>
          <li><a href="{{ url('bestmonth') }}"> Best Month for Zodiac Sign</a></li>
          <li><a href="{{ url('bestyear') }}">  Yearly Best Zodiac Sign</a></li>
        </ul>
      </nav><!-- .nav-menu --> 
    </div>
  </header><!-- End Header -->

  <main id="main">
  @yield('content')
  </main><!-- End #main -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
   <script type="text/javascript" src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
   <script type="text/javascript" src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  
  <!-- Template Main JS File --> 
  <script type="text/javascript" src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>