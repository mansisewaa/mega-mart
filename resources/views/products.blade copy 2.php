@extends('layouts.app')
<!-- Include Swiper.js CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<style>
    .banner-section {
        background-image: url('images/bannerbg7.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        color: #fff;
        text-align: center;
        padding: 90px 30px;
    }

    .banner-section h1 {
        margin: 0;
        font-size: 2rem;
    }

    .banner-section p {
        font-size: 1.2rem;
        margin: 15px 0 0;
    }

    .content {
        margin: 2rem;
    }

    .headline {
        font-size: 1.5rem;
    }

    .product-card:hover {
        transform: translateY(-5px);
    }

    .product-card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 5px;
    }

    .details {
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: auto;
        margin-top: 0.5rem;
        gap: 0.3rem;
    }

    .read-more {
        display: inline-block;
        color: #900;
        font-weight: bold;
        text-decoration: none;
    }
    h4 {
        font-size: 1.2rem !important;
    }


    .swiper {
        position: relative;
        max-height: 500px;
    }

    .swiper-slide {
        display: flex;
        align-items: stretch;
        margin-top: 1rem;
        height: auto !important;
    }

    .product-card {
        text-align: center;
        background: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 55%;
    }



    /* Swiper Buttons Styles */
    .swiper-button-prev,
    .swiper-button-next {
        position: absolute;
        top: 28%;
        transform: translateY(-50%);
        color: #900;
        border: 1px solid #900;
        padding: 23px 25px;
        font-size: 14px !important;
        transition: 0.3s ease;
        background: rgba(255, 255, 255, 0.8);
        /* border-radius: 50%; */
        z-index: 10;
    }

    .swiper-button-prev:hover,
    .swiper-button-next:hover {
        background: #990000;
        color: #fff;
    }

    .swiper-button-prev {
        left: 5px;
    }

    .swiper-button-next {
        right: 5px;
    }
</style>

@section('content')

<section class="product-section">
    <div class="container content">
        @foreach($products as $categoryName => $productList)
        <div class="row text-center headline">
            <h3 class="header">{{ $categoryName }}</h3>
            <p style="font-style: italic;">Browse our range of high-quality {{ strtolower($categoryName) }} designed for comfort and functionality.</p>
        </div>

        <!-- Swiper Carousel -->
        <div class="swiper mySwiper">
            <div class="swiper-wrapper"  style="margin-bottom: .2rem;">
                @foreach($productList as $product)
                <div class="swiper-slide">
                    <div class="product-card">
                        <img src="{{ asset('uploads/products/' . $product->product_image) }}" alt="{{ $product->product_name }}" class="img-fluid">
                        <div class="details">
                            <p>{{$product->product_code}}</p>
                            <h4>{{ $product->product_name}}</h4>
                            <a href="{{route('get-description',$product->id)}}" class="read-more">Read More</a>
                        </div>
                    </div>
                </div>

                @endforeach
            </div>

            <!-- Navigation buttons dynamically placed inside the Swiper container -->
           <div class="swiper-buttons">
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
           </div>
        </div>
        @endforeach
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
   document.addEventListener("DOMContentLoaded", function () {
       var swipers = document.querySelectorAll(".mySwiper");
       swipers.forEach((swiperEl, index) => {
           new Swiper(swiperEl, {
               slidesPerView: 4,
               spaceBetween: 30,
               navigation: {
                   nextEl: swiperEl.querySelector(".swiper-button-next"),
                   prevEl: swiperEl.querySelector(".swiper-button-prev"),
               },
               breakpoints: {
                   768: {
                       slidesPerView: 4
                   },
                   480: {
                       slidesPerView: 1
                   }
               }
           });
       });
   });
</script>
@endsection
