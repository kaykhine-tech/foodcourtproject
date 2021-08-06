@extends('layouts.frontendtemplate')
@section('title', 'Food Menu Page')
@section('content')


<!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <!-- Slide 1 -->
          <div class="carousel-item active" style="background: url({{asset('frontendtemplate/img/menu.jpg')}});">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown"><span>K&H</span> Menu List</h2>
                <p class="animate__animated animate__fadeInUp">Welcome From Our K&H Food Court ! You can browse our menu page and if something you want to eat, you can order from us. We're warmly welcome all of you. Thank you !</p>
                <div>
                  <a href="{{route('frontend.home')}}" class="btn-menu animate__animated animate__fadeInUp scrollto">HOME</a>
                  <a href="{{route('frontend.menu')}}" class="btn-book animate__animated animate__fadeInUp scrollto">MENU</a>
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

  {{-- 	  <!-- ======= Menu Section ======= -->
    <section id="menu" class="menu">
      <div class="container">

        <div class="section-title">
          <h2>Check our tasty <span>Menu</span></h2>
        </div>

        <div class="row">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="menu-flters">
              <li data-filter="*" class="filter-active">Show All</li>
              <li data-filter=".filter-starters">Rice</li>
              <li data-filter=".filter-salads">Salads</li>
              <li data-filter=".filter-specialty">Specialty</li>
            </ul>
          </div>
        </div>

        <div class="row menu-container">

          <div class="col-lg-6 menu-item filter-starters">
            <div class="menu-content">
              <a href="#">Chicken Fried Rice</a><span>4000 Ks</span>
            </div>
            <div class="menu-ingredients">
              Chicken, Rice & One Egg
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-specialty">
            <div class="menu-content">
              <a href="#">Green Tea Ice-Cream</a><span>2500 Ks</span>
            </div>
            <div class="menu-ingredients">
              Green Tea, Biscuit
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-specialty">
            <div class="menu-content">
              <a href="#">Strawberry Cake</a><span>3500 Ks</span>
            </div>
            <div class="menu-ingredients">
              Strawberry Taste Cake, Strawberry Fruits
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-specialty">
            <div class="menu-content">
              <a href="#">Americano Hot Coffee</a><span>5000 Ks</span>
            </div>
            <div class="menu-ingredients">
              Americano Taste Coffee, 2 sugar packs
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-specialty">
            <div class="menu-content">
              <a href="#">Yummy Chicken Noodle</a><span>5000 Ks</span>
            </div>
            <div class="menu-ingredients">
              Yummy Noodle, One Egg, Chicken, Vegetables
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-starters">
            <div class="menu-content">
              <a href="#">Spicy Chicken Fried Rice</a><span>5000 Ks</span>
            </div>
            <div class="menu-ingredients">
              Spicy Chicken, Rice & One Egg
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-starters">
            <div class="menu-content">
              <a href="#">Fried Rice with Pork</a><span>5000 Ks</span>
            </div>
            <div class="menu-ingredients">
              4500 Ks
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-salads">
            <div class="menu-content">
              <a href="#">Greek Salad</a><span>3000 Ks</span>
            </div>
            <div class="menu-ingredients">
              Fresh spinach, crisp romaine, tomatoes, and Greek olives
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-salads">
            <div class="menu-content">
              <a href="#">Spinach Salad</a><span>4000 Ks</span>
            </div>
            <div class="menu-ingredients">
              Fresh spinach with mushrooms, hard boiled egg, and warm bacon vinaigrette
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-specialty">
            <div class="menu-content">
              <a href="#">Orange Juice</a><span>3000 Ks</span>
            </div>
            <div class="menu-ingredients">
              Orange Fruit
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Menu Section --> --}}

    <section id="why-us" class="why-us">
      <div class="container">

        <div class="section-title">
          <h2>Food <span>Food Menu</span></h2>
          <p>You can browse our food menu and make order.</p>
        </div>

        <div class="row">
          @foreach($items as $item)
          <div class="col-lg-4">
            <div class="box">
              <span>{{$item->id}}</span>
              <h4>{{$item->name}}</h4>
              <img src="{{asset("storage/$item->photo")}}" class="ur-class">

              <p>Price:{{$item->price}} Ks</p>
              <button class="btn btn-outline-secondary add-to-cart" data-id="{{$item->id}}" data-name="{{$item->name}}" data-photo="{{$item->photo}}" data-price="{{$item->price}}">Add To Cart</button>
            </div>

          </div>
          @endforeach
        </div>

        <div class="row">
          @foreach($items as $item)
          <div class="col-lg-4">
            <div class="box">
              <span>{{$item->id}}</span>
              <h4>{{$item->name}}</h4>
              <img src="{{asset("storage/$item->photo")}}" class="ur-class">

              <p><del>Price:{{$item->price}} Ks</del></p>
              <p>Discount:{{$item->discount}} Ks</p>
              {{-- <button class="btn btn-outline-secondary add-to-cart">Add To Cart</button> --}}
              <button class="btn btn-outline-secondary add-to-cart" data-id="{{$item->id}}" data-name="{{$item->name}}" data-photo="{{$item->photo}}" data-price="{{$item->price}}" data-discount="{{$item->discount}}">Add To Cart</button>
            </div>

          </div>
          @endforeach
        </div>

      </div>
    </section><!-- End Whu Us Section -->


@endsection
@section('script')
<script type="text/javascript" src="{{asset('template/js/custom.js')}}"></script>
@endsection