<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>K&H Food Court - Home</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('frontendtemplate/img/logo.png')}}" rel="icon">
  <link href="{{asset('frontendtemplate/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,600,600i,700,700i|Satisfy|Comic+Neue:300,300i,400,400i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('frontendtemplate/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontendtemplate/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontendtemplate/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('frontendtemplate/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontendtemplate/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontendtemplate/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('frontendtemplate/css/style.css')}}" rel="stylesheet">
  <link href="{{asset('frontendtemplate/css/custom.css')}}" rel="stylesheet" />



<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

  <!-- SweetAlert2 -->
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script> --}}

  <!-- =======================================================
  * Template Name: Delicious - v4.3.0
  * Template URL: https://bootstrapmade.com/delicious-free-restaurant-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center fixed-top topbar-transparent">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-center justify-content-lg-start">
      <i class="bi bi-phone d-flex align-items-center"><span>+95 9794588892</span></i>
      <i class="bi bi-clock ms-4 d-none d-lg-flex align-items-center"><span>Mon-Sun: 9:00 AM - 7:00 PM</span></i>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <div class="logo me-auto">
        <h1><a href="index.html">K&H Food Court</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto" href="{{route('frontend.home')}}">Home</a></li>
          <li><a class="nav-link scrollto" href="{{route('frontend.about')}}">About</a></li>
          <li><a class="nav-link scrollto" href="{{route('frontend.menu')}}">Menu</a></li>
          <li><a class="nav-link scrollto" href="{{route('frontend.contact')}}">Contact</a></li>
          <li class="nav-item"><a class="nav-link" href="{{route('frontend.cart')}}"> Cart [ <span class="cartNoti">0</span> ]  </a>

          @guest
                    <li class="nav-item">
                        <a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('login')}}">{{ __('Login')}}</a>
                    </li>
                    @if(Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('register')}}">{{ __('Register')}}</a>
                    </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expaned="false">
                            {{Auth::user()->name}}
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            {{-- <li><a class="dropdown-item" href="#"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Profile</a></li>
                            <li><a class="dropdown-item" href="{{route('frontend.cart')}}"><i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>Orders</a></li> --}}
                            <li><a class="dropdown-item" href="{{route('frontend.home')}}" data-bs-toggle="modal" data-bs-target="#logoutModal"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout</a></li>
                        </ul>
                    </li>
                @endguest
                </div>
            </div>
            </ul>
        </div>
    </div>

        </ul>

        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      {{-- <a href="#book-a-table" class="book-a-table-btn scrollto">Book a table</a> --}}

    </div>
  </header><!-- End Header -->

  @yield('content')
  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <h3>K&H Food Court</h3>
      <p>CONTACT US</p>
      <div class="social-links">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
      <div class="copyright">
        &copy; Copyright <strong><span>K&H Food Court</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/delicious-free-restaurant-bootstrap-theme/ -->
        Designed by <a href="https://bootstrapmade.com/">K&H</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- ALL JS FILES -->
    <script src="{{asset('frontendtemplate/js/jquery-3.2.1.min.js')}}"></script>
    {{-- <script src="{{asset('frontendtemplate/js/popper.min.js')}}"></script>
    <script src="{{asset('frontendtemplate/js/bootstrap.min.js')}}"></script> --}}

  <!-- Vendor JS Files -->
  <script src="{{asset('frontendtemplate/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('frontendtemplate/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('frontendtemplate/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('frontendtemplate/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('frontendtemplate/vendor/swiper/swiper-bundle.min.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('frontendtemplate/js/main.js')}}"></script>


 
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
@yield('script')

<script type="text/javascript">
            $(document).ready(function(){
            $(function() {
            var path = "http://localhost:8000" + location.pathname;
            $("a[href='" + path + "']").addClass('active');
            console.log(path);
            })
            })
</script>



</body>

</html>

<!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                                <!-- <a class="btn btn-primary" href="login.html">Logout</a> -->
                                <input type="submit" class="btn btn-primary" name="btnlogout" value="Logout">
                            </div>
                        </form>
                    </div>
                </div>
            </div>


