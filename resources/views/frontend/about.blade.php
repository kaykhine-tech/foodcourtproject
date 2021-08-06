@extends('layouts.frontendtemplate')
@section('title', 'About Page')
@section('content')

<!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <!-- Slide 1 -->
          <div class="carousel-item active" style="background: url({{asset('frontendtemplate/img/about1.jpg')}});">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown"><span>ABOUT</span> US</h2>
                <p class="animate__animated animate__fadeInUp">Welcome From Our K&H Food Court ! You can browse our page and if something you want to eat, you can order from us. We're warmly welcome all of you. Thank you !</p>
                <div>
                  <a href="{{route('frontend.home')}}" class="btn-menu animate__animated animate__fadeInUp scrollto">Home</a>
                  <a href="{{route('frontend.about')}}" class="btn-book animate__animated animate__fadeInUp scrollto">ABOUT US</a>
                </div>
              </div>
            </div>
          </div>

          <!-- Slide 2 -->
          <div class="carousel-item" style="background: url({{asset('frontendtemplate/img/coffee.jpg')}});">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">ABOUT US</h2>
                <p class="animate__animated animate__fadeInUp">Welcome From Our K&H Food Court ! You can browse our page and if something you want to eat, you can order from us. We're warmly welcome all of you. Thank you !</p>
                <div>
                  <a href="{{route('frontend.home')}}" class="btn-menu animate__animated animate__fadeInUp scrollto">HOME</a>
                  <a href="{{route('frontend.about')}}" class="btn-book animate__animated animate__fadeInUp scrollto">ABOUT US</a>
                </div>
              </div>
            </div>
          </div>

          <!-- Slide 3 -->
          <div class="carousel-item" style="background: url({{asset('frontendtemplate/img/about3.jpg')}});">
            <div class="carousel-background"><img src="assets/img/slide/slide-3.jpg" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">ABOUT US</h2>
                <p class="animate__animated animate__fadeInUp">Welcome From Our K&H Food Court ! You can browse our page and if something you want to eat, you can order from us. We're warmly welcome all of you. Thank you !</p>
                <div>
                  <a href="{{route('frontend.home')}}" class="btn-menu animate__animated animate__fadeInUp scrollto">HOME</a>
                  <a href="{{route('frontend.about')}}" class="btn-book animate__animated animate__fadeInUp scrollto">ABOUT US</a>
                </div>
              </div>
            </div>
          </div>

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

      </div>
    </div>
  </section><!-- End Hero -->
<!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container-fluid">

        <div class="row">

          <div class="col-lg-5 align-items-stretch" style='background-image: url("{{asset('frontendtemplate/img/about2.jpg')}}");'>
          </div>

          <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch">

            <div class="content">
              <h3>Welcome From<strong> Our K&H Food Court 🍽</strong></h3>
              <p>
                We started opened our food court in 2021. It's one of the start up business. However, it's start-up business, we will try the best for our customers.
              </p>
              <p class="fst-italic">
                Our Food court has two branches such as Taunggyi & Monywa. If you're in Taunggyi, you can order from taunggyi address. And also, if you're in Monywa, you can order from monywa address.
              </p>
              <ul>
                <li><i class="bx bx-check-double"></i>You can get cash on delivery service in Taunggyi and Monywa.</li>
                <li><i class="bx bx-check-double"></i> For other places, you can make payment with KBZpay and Wavepay.</li>
                <li><i class="bx bx-check-double"></i>We will try the best for our customers. </li>
              </ul>
              <p>
                For services, our team will give the best services for our customers. We keep food as fresh as we can for our customer's orders. So, you can order with confidence. Thank you!.
              </p>
            </div>

          </div>

        </div>

      </div>
    </section><!-- End About Section -->

@endsection