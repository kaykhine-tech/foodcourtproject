@extends('layouts.frontendtemplate')
@section('title', 'Home Page')
@section('content')


<!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <!-- Slide 1 -->
          <div class="carousel-item active" style="background: url({{asset('frontendtemplate/img/slide/slide2.jpg')}});">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown"><span>K&H</span> Food Court</h2>
                <p class="animate__animated animate__fadeInUp">Welcome From Our K&H Food Court ! You can browse our page and if something you want to eat, you can order from us. We're warmly welcome all of you. Thank you !</p>
                <div>
                  <a href="{{route('frontend.home')}}" class="btn-menu animate__animated animate__fadeInUp scrollto">HOME</a>
                  <a href="{{route('frontend.about')}}" class="btn-book animate__animated animate__fadeInUp scrollto">ABOUT US</a>
                </div>
              </div>
            </div>
          </div>

          <!-- Slide 2 -->
          <div class="carousel-item" style="background: url({{asset('frontendtemplate/img/slide/slide1.jpg')}});">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">K&H Food Court</h2>
                <p class="animate__animated animate__fadeInUp">Welcome From Our K&H Food Court ! You can browse our page and if something you want to eat, you can order from us. We're warmly welcome all of you. Thank you !</p>
                <div>
                  <a href="{{route('frontend.home')}}" class="btn-menu animate__animated animate__fadeInUp scrollto">HOME</a>
                  {{-- <a href="{{route('frontend.about')}}" class="btn-book animate__animated animate__fadeInUp scrollto">ABOUT US</a> --}}
                </div>
              </div>
            </div>
          </div>

          <!-- Slide 3 -->
          <div class="carousel-item" style="background: url({{asset('frontendtemplate/img/slide/slide3.jpg')}});">
            <div class="carousel-background"><img src="assets/img/slide/slide-3.jpg" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">K&H Food Court</h2>
                <p class="animate__animated animate__fadeInUp">Welcome From Our K&H Food Court ! You can browse our page and if something you want to eat, you can order from us. We're warmly welcome all of you. Thank you !</p>
                <div>
                  <a href="{{route('frontend.home')}}" class="btn-menu animate__animated animate__fadeInUp scrollto">HOME</a>
                  {{-- <a href="{{route('frontend.about')}}" class="btn-book animate__animated animate__fadeInUp scrollto">ABOUT US</a> --}}
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

  
  <!-- ======= Frontend Category Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container">

        <div class="section-title">
          <h2>Food <span>Categories</span></h2>
          <p>You can browse our food categories.</p>
        </div>

        <div class="row">
          @foreach($categories as $category)
          <div class="col-lg-4">
            <div class="box">
              <span>{{$category->id}}</span>
              <h4>{{$category->name}}</h4>
              
              <img src="{{asset("$category->photo")}}">
            </div>
          </div>
          @endforeach
        </div>

      </div>
    </section><!-- End Whu Us Section -->


      <!-- ======= Whu Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container">

        <div class="section-title">
          <h2>Food <span>Discount Items</span></h2>
          <p>You can browse our discount food categories.</p>
        </div>

        <div class="row">

          <div class="col-lg-4">
            <div class="box">
              <span>01</span>
              <h4>Bread</h4>
              <img src="{{asset('frontendtemplate/img/category4.jpg')}}">
              <del>Price: 4000 Ks</del>
              <p>Discount Price: 3500 Ks</p>
              <button class="btn btn-outline-secondary">Add To Cart</button>
            </div>

          </div>

          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="box">
              <span>02</span>
              <h4>Pork Pizza</h4>
              <img src="{{asset('frontendtemplate/img/pizza.jpg')}}">
              <del>Price: 18000 Ks</del>
              <p>Discount Price: 16000 Ks</p>
              <button class="btn btn-outline-secondary">Add To Cart</button>
            </div>

          </div>

          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="box">
              <span>03</span>
              <h4>Noodle Soup</h4>
              <img src="{{asset('frontendtemplate/img/noodle.jpg')}}">
              <del>Price: 6000 Ks</del>
              <p>Discount Price: 4500 Ks</p>
              <button class="btn btn-outline-secondary">Add To Cart</button>
            </div>


          {{-- <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="box">
              <span>04</span>
              <h4>Bread</h4>
              <p>Molestiae officiis omnis illo asperiores. Aut doloribus vitae sunt debitis quo vel nam quis</p>
              <img src="{{asset('frontendtemplate/img/category4.jpg')}}">
            </div>
          </div> --}}


        </div>

      </div>
    </section><!-- End Whu Us Section -->


@endsection