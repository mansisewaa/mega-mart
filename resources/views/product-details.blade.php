@extends('layouts.app')
<style>
    .banner-section {
        background-image: url();
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

    .header {
        text-align: center;
        margin-bottom: 40px;
    }

    .product-details-section {
        padding: 50px 0;
    }

    .product-image {
        max-height: 350px;
    }


    .product-image img {
        width: 100%;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .product-info {
        padding: 20px;
        text-align: left;
    }

    .productInfo h1, p {
        text-align: center;
        font-size: 25px !important;
        margin: 10px;
    }

    .product-code {
        font-style: italic;
        color: #555;
    }

    .product-price {
        font-size: 1.5rem;
        color: #900;
        margin-top: 15px;
    }

    .btn-primary {
        background-color: #900;
        border: none;
        padding: 10px 20px;
        font-size: 1rem;
        border-radius: 5px;
    }

    .btn-primary:hover {
        background-color: #700;
    }
</style>

@section('content')
<!-- <section class="banner-section">
    <div class="container">
        <h1>Products & Services</h1>
    </div>
</section> -->
<section class="product-details-section">
    <div class="header">
        <h2>Product Details</h2>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="product-image">
                    <img src="{{ asset('uploads/products/' . $data->product_image) }}" alt="{{ $data->product_name }}" class="img-fluid">
                    <div class="productInfo">
                        <h1>{{ $data->product_name }}</h1>
                        <p class="product-code"><strong>Product Code</strong>: {{ $data->product_code }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="product-info">
                    <p class="product-description"> <span style="font-size: 20px;"><strong>Description</strong></span> </br>{!!$data->product_description !!}</p>
                </div>
            </div>
        </div>
</section>
@endsection
