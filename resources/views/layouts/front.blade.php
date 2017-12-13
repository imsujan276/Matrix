<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>@yield('title')</title>

  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Facebook Opengraph integration: https://developers.facebook.com/docs/sharing/opengraph -->
  <meta property="og:title" content="">
  <meta property="og:image" content="">
  <meta property="og:url" content="">
  <meta property="og:site_name" content="">
  <meta property="og:description" content="">

  <!-- Twitter Cards integration: https://dev.twitter.com/cards/  -->
  <meta name="twitter:card" content="summary">
  <meta name="twitter:site" content="">
  <meta name="twitter:title" content="">
  <meta name="twitter:description" content="">
  <meta name="twitter:image" content="">

  <!-- Favicon -->
  <link href="{{ asset('img/favicon.ico') }}" rel="icon">

  <!-- Bootstrap CSS File -->

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/bootstrap-theme.min.css') }}" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="{{ asset('lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="{{ asset('lib/style.css') }}" rel="stylesheet">

</head>

<body>

  <!-- Page Content
    ================================================== -->

    <!-- Header -->

    <div id="top-sponsor">
      <div class="container">
          @if (Session::has('referral'))
            <?php
              $ref_name = Session::get('referral')->name;
              $ref_id = Session::get('referral')->id;
            ?>
            @else
            <?php
                $ref_name = "Admin";
                $ref_id = 1;
            ?>
          @endif
          
                <p>Your Upline or Sponsor is <b>{{ucwords($ref_name)}}</b></p>
              
      </div>
  </div>

  <header id="header" >
    <div class="container">

      <div id="logo" class="pull-left">
          <a href="/"> 
            <img src="{{asset('img/logo.png') }}">
          </a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu text-center">
          <li><a href="/">Home</a></li>
          <li><a href="/page/how-it-works">How It Works</a></li>
          <li><a href="/page/faq">FAQs</a></li>
          <li><a href="/page/about-us">About Us</a></li>
          <li><a href="/page/terms">Terms</a></li>
          <li><a href="/page/support">Support</a></li>

                    @auth
                        <li><a href="{{ route('back_office') }}">Dashboard</a></li>
                    @else
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @endauth          
        </ul>
      </nav>
      <!-- #nav-menu-container -->

      <nav class="nav social-nav pull-right d-none d-lg-inline">
        <a href="#"><i class="fa fa-facebook"></i></a> 
      </nav>
    </div>
  </header>
  <!-- #header -->
  
  @yield('content')


              <div id="processors">
                <div class="container">
                    <center><img src="{{asset('img/processors.png') }}"/></center>
                </div>
            </div>


  <footer class="site-footer">
    <div class="bottom">
      <div class="container">
        <div class="row">

          <div class="col-lg-6 col-xs-12 text-lg-left ">
            <p class="copyright-text">
              &copy; All Rights Reserved. 
            </p>
          </div>

          <div class="col-lg-6 col-xs-12 text-lg-right text-center">
            <ul class="list-inline">
              <li class="list-inline-item"><a href="/">Home</a></li>
              <li class="list-inline-item"><a href="/page/how-it-works">How It Works</a></li>
              <li class="list-inline-item"><a href="/page/faq">FAQs</a></li>
              <li class="list-inline-item"><a href="/page/about-us">About Us</a></li>
              <li class="list-inline-item"><a href="/page/terms">Terms</a></li>
              <li class="list-inline-item"><a href="/page/support">Support</a></li>
            </ul>
          </div>

        </div>
      </div>
    </div>
  </footer>
  <a class="scrolltop" href="#"><span class="fa fa-angle-up"></span></a>


  <!-- Required JavaScript Libraries -->
  <script src="{{ asset('lib/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('lib/jquery/jquery-migrate.min.js') }}"></script>
  <script src="{{ asset('lib/superfish/hoverIntent.js') }}"></script>
  <script src="{{ asset('lib/superfish/superfish.min.js') }}"></script>
  <script src="{{ asset('lib/tether/js/tether.min.js') }}"></script>
  <script src="{{ asset('lib/stellar/stellar.min.js') }}"></script>
  <script src="{{ asset('lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('lib/counterup/counterup.min.js') }}"></script>
  <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
  <script src="{{ asset('lib/easing/easing.js') }}"></script>
  <script src="{{ asset('lib/stickyjs/sticky.js') }}"></script>
  <script src="{{ asset('lib/parallax/parallax.js') }}"></script>
  <script src="{{ asset('lib/lockfixed/lockfixed.min.js') }}"></script>

  <!-- Template Specisifc Custom Javascript File -->
  <script src="{{ asset('lib/custom.js') }}"></script>

</body>
</html>
