@extends('layouts.frontendtemplate')
@section('title', 'Category-Detail Page')
@section('content')

<!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <!-- Slide 1 -->
          <div class="carousel-item active" style="background: url({{asset('frontendtemplate/img/detail.jpg')}});">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown"><span>K&H</span> Food Court</h2>
                <p class="animate__animated animate__fadeInUp">Welcome From Our K&H Food Court ! You can browse our page and if something you want to eat, you can order from us. We're warmly welcome all of you. Thank you !</p>
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

  <section id="why-us" class="why-us">
      <div class="container">
        <div class="row">
          @foreach($categoryfilter as $item)
          <div class="col-lg-4" id="category_id">
            <div class="box">
              {{-- <span>{{$item->id}}</span> --}}
              <h4>{{$item->name}}</h4>
              <img src="{{asset("storage/$item->photo")}}" class="ur-class">
              @if(!$item->discount)
              <p>Price:{{$item->price}} Ks</p>
              <p>No Discount</p>
              @else
              <p><del>Price:{{$item->price}} Ks</del></p>
              <p>Discount:{{$item->discount}} Ks</p>
              @endif
              <button class="btn btn-outline-secondary add-to-cart" data-id="{{$item->id}}" data-name="{{$item->name}}" data-photo="{{$item->photo}}" data-price="{{$item->price}}" data-discount="{{$item->discount}}">Add To Cart</button>
            </div>

          </div>
          @endforeach
        </div>

        </div>

      </div>
    </section><!-- End Whu Us Section -->

@endsection
@section('script')
<script type="text/javascript" src="{{asset('template/js/custom.js')}}"></script>
@endsection