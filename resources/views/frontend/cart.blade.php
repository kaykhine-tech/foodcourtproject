@extends('layouts.frontendtemplate')
@section('title', 'Cart Page')
@section('content')

<!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <!-- Slide 1 -->
          <div class="carousel-item active" style="background: url({{asset('frontendtemplate/img/cart.jpg')}});">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown"><span>Your</span>Order Cart</h2>
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

  <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row shoppingcart_div">
                <div class="col-lg-12">
                    <h2>Cart</h2>
                    {{-- <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Cart</li>
                    </ul> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Cart Div -->
    <div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Remove</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th colspan="3">Quantity</th>
                                    <th colspan="6">Total</th>
                                </tr>
                            </thead>
                            <tbody id="tbody">

                            </tbody>
                            <tfoot>
                              <tr>
                                <td colspan="8"></td>
                                <td>
                                  <button class="btn btn-success checkout">Checkout</button>
                                </td>
                              </tr>

                              
                            </tfoot>
                          </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
       {{-- Shoppingcart Div --}}
		{{-- <div class="row shoppingcart_div justify-content-center">
            <div class="col-10 shadow p-3 mb-5 bg-white rounded">
                <div class="row">
                    <div class="col-4">
                        <img src="{{asset('frontendtemplate/images/success.png')}}" class="img-fluid">
                    </div>
                <div class="col-8 pt-5">
                    <h1> Your order is complete</h1>
                    <p> You order will be delivered in 5 days.</p>
                </div>
            </div>
        </div>
    </div>
</div> --}}

        <!-- No Shopping Cart Div -->
        {{-- <div class="row mt-5 noneshoppingcart_div text-center">
            
            <div class="col-12">
                <h5 class="text-center"> There are no items in this cart </h5>
            </div>

            <div class="col-12 mt-5 ">
                <a href="categories" class="btn btn-secondary mainfullbtncolor px-3" > 
                    <i class="icofont-shopping-cart"></i>
                    Continue Shopping 
                </a>
                <img src="{{asset('frontendtemplate/images/emptycart.gif')}}">
            </div>

        </div>

    </div> --}}
    
                           
    <!-- End Cart -->

@endsection
@section('script')
<script type="text/javascript" src="{{asset('template/js/custom.js')}}"></script>
@endsection