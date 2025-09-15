@extends('layouts.app')
<style>
    /* Custom styles to match the provided layout */
    /* body {
            font-family: 'Poppins', sans-serif;
            background-color: #ffffff;
        } */

    .products-container {
        max-width: 1200px;
        margin: 50px auto;
        background-color: #fff;
        padding: 2rem;
        border-radius: 15px;
    }

    /* Image gallery styles */
    .main-image-container {
        background-color: #f8f9fa;
        border-radius: 2px;
        padding: 5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 424px;
    }

    .main-product-image {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
    }

    .thumbnail-gallery {
        display: flex;
        flex-direction: column;
        gap: 2rem;
    }

    .thumbnail-container {
        background-color: #f8f9fa;
        border-radius: 2px;
        padding: 1rem;
        cursor: pointer;
        border: 2px solid transparent;
        transition: border-color 0.3s ease;
    }

    .thumbnail-container:hover,
    .thumbnail-container.active {
        border-color: #4a69bd;
    }

    .thumbnail-img {
        width: 100%;
        border-radius: 5px;
        object-fit: cover;
    }

    /* Product details styles */
    .product-title {
        font-weight: 600;
        color: #343a40;
        font-size: 24px !important;
        text-align: start !important;
    }
    .product-title:hover {
        font-weight: 600;
        color: #343a40 !important;
        font-size: 24px !important;
        text-align: start !important;
    }

    .star-rating .fa-star {
        color: #ffc107;
        /* Yellow for filled stars */
    }

    .star-rating .fa-star.empty {
        color: #e4e5e9;
        /* Light grey for empty stars */
    }

    .price-range {
        font-size: 22px !important;
        font-weight: 600;
        color: #4a69bd;
        margin-top: 1rem;
        color: #3C66CF;
    }

    .product-description p {
        color: #6c757d;
        margin-top: 1.5rem;
        font-family: 'Outfit', sans-serif;
        font-weight: 400;
        font-size: 16px !important;
        line-height: 26px;
        letter-spacing: 0%;
        vertical-align: middle;

    }

    /* Quantity selector styles */
    .quantity-selector {
        display: flex;
        align-items: center;
        background-color: #f8f9fa;
        border-radius: 30px;
        padding: 5px;
        width: fit-content;
    }

    .quantity-btn {
        background-color: #fff;
        border: 1px solid #dee2e6;
        color: #495057;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        font-size: 1.2rem;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .quantity-btn:hover {
        background-color: #e9ecef;
    }

    .quantity-input {
        width: 50px;
        text-align: center;
        border: none;
        background-color: transparent;
        font-weight: 600;
        font-size: 1.1rem;
        color: #343a40;
    }

    /* Hide number input spinners */
    .quantity-input::-webkit-outer-spin-button,
    .quantity-input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type=number] {
        -moz-appearance: textfield;
    }

    /* Add to cart button styles */
    .add-to-cart-btn {
        background: linear-gradient(180deg, #1F5FFF 0%, #95B5FD 100%);
        color: #fff;
        border: none;
        padding: 0.8rem 2rem;
        border-radius: 30px;
        transition: background-color 0.3s ease;
        font-family: 'DM Sans', sans-serif;
        font-weight: 700;
        font-style: Bold;
        font-size: 14px;
        text-align: center;
        vertical-align: middle;
        text-transform: uppercase;

    }

    .add-to-cart-btn:hover {
        background-color: #4a69bd;
        color: #fff;
    }

    .original-price {
        text-decoration: line-through;
        color: #888;
    }

    .product-info {
        margin-top: 0.8rem;
        font-family: 'DM Sans', sans-serif;
        font-size: 15px !important;
        font-weight: 500;
        color: #6c757d;
        letter-spacing: 0.3px;
        text-align: start !important;
        padding: 2px !important;
    }

    .product-info .separator {
        margin: 0 8px;
         color: #3C66CF;
    }

    .product-info .product-category {
        color: #3C66CF;
        /* matches price blue tone */
        font-weight: 600;
    }

    .product-info .product-code {
        color: #3C66CF;
         font-weight: 600;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .thumbnail-gallery {
            flex-direction: row;
            justify-content: center;
            margin-top: 1rem;
        }

        .thumbnail-container {
            width: 80px;
        }

        .product-title {
            font-size: 2rem;
            text-align: center;
        }

        .product-details-col {
            text-align: center;
        }

        .actions-row {
            flex-direction: column;
            align-items: center;
        }

        .quantity-selector {
            margin-bottom: 1rem;
        }
    }
</style>
@section('content')


<div class="container products-container" style="padding:20px;">
    <div class="row align-items-center">
        <!-- Column 1: Image Gallery -->
        <div class="col-lg-7">
            <div class="row">
                <!-- Thumbnails -->
                <div class="col-md-2 order-md-1">
                    <div class="thumbnail-gallery">
                        <div class="thumbnail-container active">
                            <img src="{{asset('uploads/products/'.$product->product_image)}}" alt="Product Thumbnail 1" class="thumbnail-img">
                        </div>
                        <div class="thumbnail-container">
                            <img src="{{asset('uploads/products/'.$product->product_image)}}" alt="Product Thumbnail 2" class="thumbnail-img">
                        </div>
                        <div class="thumbnail-container">
                            <img src="{{asset('uploads/products/'.$product->product_image)}}" alt="Product Thumbnail 3" class="thumbnail-img">
                        </div>
                        <div class="thumbnail-container">
                            <img src="{{asset('uploads/products/'.$product->product_image)}}" alt="Product Thumbnail 4" class="thumbnail-img">
                        </div>
                    </div>
                </div>
                <!-- Main Image -->
                <div class="col-md-10 order-md-2">
                    <div class="main-image-container">
                        <img src="{{asset('uploads/products/'.$product->product_image)}}" alt="Main Product Image" class="main-product-image" id="main-product-image">
                    </div>
                </div>
            </div>
        </div>

        <!-- Column 2: Product Details -->
        <div class="col-lg-5 mt-4 mt-lg-0 product-details-col">
            <h1 class="product-title">{{$product->product_name}}</h1>

            <!-- Category & Code -->
            <div class="product-info">
                <span class="product-category">{{$product->category->name ?? 'Uncategorized'}}</span>
                <span class="separator">|</span>
                <span class="product-code">Code: {{$product->product_code ?? 'N/A'}}</span>
            </div>
            <p class="price-range">
                {{formatRupees($product->product_discount_price)}} -
                <span class="original-price">{{formatRupees($product->product_original_price)}}</span>
            </p>

            <div class="product-description">
                {!!$product->product_description!!}
            </div>

            <form action="{{ route('customer.cart.add', $product->id) }}" method="POST" class="d-flex align-items-center mt-4 actions-row">
                @csrf

                <!-- Quantity Selector -->
                <div class="quantity-selector me-3">
                    <button type="button" class="quantity-btn" id="decrease-qty">-</button>
                    <input type="number" name="quantity" class="quantity-input" id="quantity-input" value="1" min="1">
                    <button type="button" class="quantity-btn" id="increase-qty">+</button>
                </div>

                <!-- Add to Cart Button -->
                <button type="submit" class="add-to-cart-btn">Add to Cart</button>
            </form>
        </div>

    </div>
</div>

@endsection

@section('js')
<script>
    const decreaseBtn = document.getElementById('decrease-qty');
    const increaseBtn = document.getElementById('increase-qty');
    const qtyInput = document.getElementById('quantity-input');

    decreaseBtn.addEventListener('click', () => {
        let current = parseInt(qtyInput.value);
        if (current > parseInt(qtyInput.min)) {
            qtyInput.value = current - 1;
        }
    });

    increaseBtn.addEventListener('click', () => {
        let current = parseInt(qtyInput.value);
        qtyInput.value = current + 1;
    });
</script>
@endsection
