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
          <div class="carousel-item active" style="background: url({{asset('frontendtemplate/img/slide/slide3.jpg')}});">
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

          <!-- Slide 2 -->
          <div class="carousel-item" style="background: url({{asset('frontendtemplate/img/slide/slide1.jpg')}});">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">K&H Food Court</h2>
                <p class="animate__animated animate__fadeInUp">Welcome From Our K&H Food Court ! You can browse our page and if something you want to eat, you can order from us. We're warmly welcome all of you. Thank you !</p>
                <div>
                  <a href="{{route('frontend.home')}}" class="btn-menu animate__animated animate__fadeInUp scrollto">HOME</a>
                  <a href="{{route('frontend.menu')}}" class="btn-book animate__animated animate__fadeInUp scrollto">MENU</a>
                </div>
              </div>
            </div>
          </div>

          <!-- Slide 3 -->
          <div class="carousel-item" style="background: url({{asset('frontendtemplate/img/slide/slide2.jpg')}});">
            <div class="carousel-background"><img src="assets/img/slide/slide-3.jpg" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">K&H Food Court</h2>
                <p class="animate__animated animate__fadeInUp">Welcome From Our K&H Food Court ! You can browse our page and if something you want to eat, you can order from us. We're warmly welcome all of you. Thank you !</p>
                <div>
                  <a href="{{route('frontend.home')}}" class="btn-menu animate__animated animate__fadeInUp scrollto">HOME</a>
                  <a href="{{route('frontend.menu')}}" class="btn-book animate__animated animate__fadeInUp scrollto">MENU</a>
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

        <div class="row" id="category_id">
          @foreach($categories as $category)
          <div class="col-lg-4">
            <div class="box">
              {{-- <span>{{$category->id}}</span> --}}
              <h4>{{$category->name}}</h4>
              
              <a href="{{route('categoryfilter',$category->id)}}"><img src="{{asset("storage/$category->photo")}}" class="ur-class"></a>

            </div>
          </div>
          @endforeach

        </div>

      </div>
    </section><!-- End Whu Us Section -->


      <!-- ======= Discount Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container">

        <div class="section-title">
          <h2>Food <span>Summer Promotion Discount Items</span></h2>
          <p>You can browse our discount food categories.</p>
        </div>

        <div class="row">
         
          @foreach($dis_items as $item)
          <div class="col-lg-4">
            <div class="box">
              {{-- <span>{{$item->id}}</span> --}}
              <h4>{{$item->name}}</h4>
              <img src="{{asset("storage/$item->photo")}}" class="ur-class">
              @if(!$item->discount)
              <p>Price:{{$item->price}} Ks</p>
              @else
              <p><del>Price:{{$item->price}} Ks</del></p>
              <p>Discount:{{$item->discount}} Ks</p>
              @endif

              @if ($nows=="ShowAddtocart")
              <button class="btn btn-outline-secondary add-to-cart" data-id="{{$item->id}}" data-name="{{$item->name}}" data-photo="{{$item->photo}}" data-price="{{$item->price}}" data-discount="{{$item->discount}}">Add To Cart</button>
              @else
              <button class="btn btn-primary btn-sm" title="Please 8:00AM to 5:00PM ">Order Closed</button>
              @endif

              {{-- <button class="btn btn-outline-secondary add-to-cart">Add To Cart</button> --}}
              {{-- <button class="btn btn-outline-secondary add-to-cart" data-id="{{$item->id}}" data-name="{{$item->name}}" data-photo="{{$item->photo}}" data-price="{{$item->price}}" data-discount="{{$item->discount}}">Add To Cart</button> --}}
            </div>

          </div>
          @endforeach
        </div>
       

      </div>
    </section><!-- End Whu Us Section -->

@endsection
@section('script')
<script type="text/javascript" src="{{asset('template/js/custom.js')}}"></script>
{{-- <script type="text/javascript">
@if(Session::has('message'))
    var type="{{Session::get('alert-type','info')}}"


    switch(type){
        case 'info':
        toastr.info("{{ Session::get('message') }}");
        break;
        case 'success':
        toastr.success("{{ Session::get('message') }}",toastr.options={
            "closeButton":true,
            "positionClass":"toast-top-center",
        });
        break;
        case 'warning':
        toastr.warning("{{ Session::get('message') }}");
        break;
        case 'error':
        toastr.error("{{ Session::get('message') }}");
        break;
    }
    @endif
</script> --}}
@endsection