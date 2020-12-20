<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Inbound Study Abroad - International Office UINSA</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('user/assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('user/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i,900" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('user/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{asset('user/assets/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
  <link href="{{asset('user/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{asset('user/assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
  <link href="{{asset('user/assets/vendor/venobox/venobox.css') }}" rel="stylesheet">
  <link href="{{asset('user/assets/vendor/aos/aos.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('user/assets/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Mamba - v2.0.1
  * Template URL: https://bootstrapmade.com/mamba-one-page-bootstrap-template-free/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

</head>

<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-none d-lg-block">
    <div class="container clearfix">
      <div class="contact-info float-left">
        <i class="icofont-envelope"></i><a href="mailto:contact@example.com">io@uinsby.ac.id</a>
        <i class="icofont-phone"></i> 031-841 0298
      </div>
      <div class="social-links float-right">
        <a href="https://twitter.com/humas_uin" class="twitter"><i class="icofont-twitter"></i></a>
        <a href="https://web.facebook.com/UINSBYOfficial" class="facebook"><i class="icofont-facebook"></i></a>
        <a href="https://www.instagram.com/uinsa_surabaya/" class="instagram"><i class="icofont-instagram"></i></a>
        <a href="https://id.linkedin.com/company/uin-sunan-ampel-surabaya" class="linkedin"><i class="icofont-linkedin"></i></i></a>
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="container" >

      <div class="logo float-left">
        <h1 class="text-light"><a href="{{ url('/') }}"><span>Study Abroad</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu float-right d-none d-lg-block">
        <ul>
          <li class="active"><a href="{{ url('/') }}#header">Home</a></li>
          <li><a href="{{ url('/') }}#about">About Us</a></li>
          <li><a href="{{ url('/') }}#services">Faculty</a></li>
          <li class="drop-down"><a href="#">Registration</a>
            <ul>
              <li><a href="{{ url('/') }}#portfolio">Registration Flow</a></li>
              <li><a href="{{ url('/') }}#team">Register</a></li>
              <li><a href="{{ url('/') }}#check-status">Registration Status</a></li>
            </ul>
          </li>
          <li><a href="{{ url('/') }}#faq">FAQ</a></li>
          <li><a href="{{ url('/') }}#contact">Contact Us</a></li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  @yield('content')

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">
            <h3>UINSA</h3>
            <h4>Inbound Study Abroad</h4>
            <p>Jl. Ahmad Yani No.117, Jemur Wonosari, Kec. Wonocolo<br>
              Kota Surabaya, Jawa Timur 60237<br><br></p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#about">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#services">Faculty</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#faq">FAQ</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#contact">Contact Us</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Contact</h4>
              <strong>Phone:</strong> (031) 8410298<br>
              <strong>Email:</strong> humas@uinsby.ac.id<br>
            </p>
            <div class="social-links mt-3">
                <a href="https://twitter.com/humas_uin" class="twitter"><i class="icofont-twitter"></i></a>
                <a href="https://web.facebook.com/UINSBYOfficial" class="facebook"><i class="icofont-facebook"></i></a>
                <a href="https://www.instagram.com/uinsa_surabaya/" class="instagram"><i class="icofont-instagram"></i></a>
                <a href="https://id.linkedin.com/company/uin-sunan-ampel-surabaya" class="linkedin"><i class="icofont-linkedin"></i></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>UINSA</span></strong>. All Rights Reserved
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('user/assets/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{asset('user/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('user/assets/vendor/jquery.easing/jquery.easing.min.js ')}}"></script>
  <script src="{{asset('user/assets/vendor/php-email-form/validate.js' )}}"></script>
  <script src="{{asset('user/assets/vendor/jquery-sticky/jquery.sticky.js') }}"></script>
  <script src="{{asset('user/assets/vendor/venobox/venobox.min.js ')}}"></script>
  <script src="{{asset('user/assets/vendor/waypoints/jquery.waypoints.min.js' )}}"></script>
  <script src="{{asset('user/assets/vendor/counterup/counterup.min.js ')}}"></script>
  <script src="{{asset('user/assets/vendor/isotope-layout/isotope.pkgd.min.js' )}}"></script>
  <script src="{{asset('user/assets/vendor/aos/aos.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('user/assets/js/main.js') }}"></script>

</body>

</html>
