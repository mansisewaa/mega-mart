@extends('layouts.app')
<style>
    @media (max-width: 768px) {
        .certifications-scroll {
            display: block;
        }

        .cert {
            /* margin-bottom: 20px; */
            width: 100%;
        }

        .dir-content {
            text-align: center;
        }

        .dir-desig {
            text-align: center;
        }
    }
</style>
@section('content')
<section class="hero-section hero-section-full-height">
    <div class="container-fluid p-0">
        <div class="row g-0 align-items-center">

            <!-- Left content -->
            <div class="col-lg-6 col-12 hero-left">
                <small class="hero-subtitle">100% PREMIUM PRODUCTS</small>
                <h2 class="hero-title">Quality You Can Trust.<br>Equipment That <br>Cares.</h2>
                <p class="hero-offer">Get <span>25%</span> Off, Hurry Up!</p>
                <a href="#" class="hero-btn">SHOP NOW</a>
            </div>

            <!-- Right image with vertical scroll -->
            <div class="col-lg-6 col-12 hero-right">
                <div class="scrolling-image-container">
                    <img src="{{asset('img/product1.png')}}" alt="Product 1" class="scroll-img active">
                    <img src="{{asset('img/product2.png')}}" alt="Product 2" class="scroll-img">
                    <img src="{{asset('img/product3.png')}}" alt="Product 3" class="scroll-img">
                </div>
            </div>

        </div>
    </div>
</section>

<section class="product-section py-5">
    <div class="container">
        <div class="row g-4 justify-content-center">

            <!-- Card 1 -->
            <div class="col-md-4 col-sm-6">
                <div class="product-card" style="background-color: #E6F1FF;">
                    <div class="card-content">
                        <div class="card-text">
                            <span class="discount-text">GET UP TO 26%</span>
                            <h3 class="product-title">ICU Bed - Electric</h3>
                            <p class="product-price">
                                <span class="current">$80.00</span>
                                <span class="old">$120.00</span>
                            </p>
                            <a href="#" class="shop-btn">SHOP NOW</a>
                        </div>
                        <div class="card-image">
                            <img src="img/product1.png" alt="ICU Bed" class="product-img">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-4 col-sm-6">
                <div class="product-card" style="background-color: #EAE9FF;">
                    <div class="card-content">
                        <div class="card-text">
                            <span class="discount-text">GET UP TO 26%</span>
                            <h3 class="product-title">Patient Transfer <br>Trolleys</h3>
                            <p class="product-price">
                                <span class="current">$80.00</span>
                                <span class="old">$120.00</span>
                            </p>
                            <a href="#" class="shop-btn">SHOP NOW</a>
                        </div>
                        <div class="card-image">
                            <img src="img/product2.png" alt="Trolley" class="product-img">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-md-4 col-sm-6">
                <div class="product-card" style="background-color: #E5F9F1;">
                    <div class="card-content">
                        <div class="card-text">
                            <span class="discount-text">GET UP TO 26%</span>
                            <h3 class="product-title">Over Bed / Cardiac Tables</h3>
                            <p class="product-price">
                                <span class="current">$80.00</span>
                                <span class="old">$120.00</span>
                            </p>
                            <a href="#" class="shop-btn">SHOP NOW</a>
                        </div>
                        <div class="card-image">
                            <img src="img/product3.png" alt="Cardiac Table" class="product-img">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="shop-category py-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="section-title">Shop By Category</h2>
            <div class="category-arrows">
                <button class="arrow-btn"><span>&larr;</span></button>
                <button class="arrow-btn"><span>&rarr;</span></button>
            </div>
        </div>

        <div class="category-wrapper">
            <div class="category-row d-flex">
                @foreach($categories as $category)
                <div class="col-auto">
                    <a href="{{ route('products.byCategory', $category->id) }}">
                        <div class="category-card">
                            @if($category->file)
                            <img src="{{ asset('uploads/categoryfiles/' . $category->file) }}" alt="{{ $category->name }}">
                            @else
                            <img src="{{ asset('img/no_img.jpg') }}" alt="{{ $category->name }}">
                            @endif
                            <h3 class="category-title">{{ $category->name }}</h3>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="custom-latest-products py-5">
    <div class="container">
        <div class="custom-header d-flex justify-content-between align-items-center mb-4">
            <h2 class="custom-section-title">Our Latest Products</h2>
            <div class="custom-filter-buttons">
                <button class="custom-filter-btn active">FEATURED</button>
                <button class="custom-filter-btn">NEW</button>
                <!-- <button class="custom-filter-btn">BEST SELLING</button> -->
            </div>
        </div>

        <div class="row g-4 py-5 customer-product-grid">
            <!-- Product Card -->

            <div class="customer-product-grid">
                @foreach($products as $product)
                <div class="custom-product-card" data-id="{{ $product->id }}">
                    <div class="custom-product-actions">
                        <button class="custom-icon-btn wishlist-btn {{ in_array($product->id, $wishlistIds) ? 'active' : '' }}"
                            data-id="{{ $product->id }}">
                            <i class="fa fa-heart"></i>
                        </button>
                        <a href="{{route('product.view',$product->id)}}" class="custom-icon-btn" style="text-decoration:none;">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </a>
                    </div>
                    <img src="{{ asset('uploads/products/' . $product->product_image)}}" alt="Product" class="custom-product-img">
                    <p class="custom-product-category">{{$product->category->name}}</p>
                    <h3 class="custom-product-name">{{$product->product_name}}</h3>
                    <div class="custom-product-price">
                        <span class="custom-new-price">{{formatRupees($product->product_discount_price)}}</span>
                        <span class="custom-old-price">{{formatRupees($product->product_original_price)}}</span>
                    </div>
                </div>
                @endforeach
            </div>


        </div>
    </div>
</section>

<section class="vhpl-section">
    <div class="container">
        <div class="vhpl-row">
            <!-- Left Content -->
            <div class="vhpl-text">
                <h2>VHPL Healthcare Solutions <br> Trusted Hospital Furniture Manufacturer</h2>

                <div class="vhpl-features">
                    <div class="vhpl-feature">
                        <div class="vhpl-icon">
                            <img src="img/shipping.png" alt="Shipping Icon">
                        </div>
                        <span class="vhpl-subtitle">Quick nationwide shipping</span>
                    </div>
                    <div class="vhpl-feature">
                        <div class="vhpl-icon">
                            <img src="img/support.png" alt="Support Icon">
                        </div>
                        <span class="vhpl-subtitle">24/7 support</span>
                    </div>
                    <div class="vhpl-feature">
                        <div class="vhpl-icon">
                            <img src="img/finder.png" alt="Product Finder Icon">
                        </div>
                        <span class="vhpl-subtitle">Quick Product Finder</span>
                    </div>
                    <div class="vhpl-feature">
                        <div class="vhpl-icon">
                            <img src="img/hospitals.png" alt="Trusted Icon">
                        </div>
                        <span class="vhpl-subtitle">Trusted by 100+ Hospitals</span>
                    </div>
                </div>
            </div>

            <!-- Right Image -->
            <div class="vhpl-image">
                <img src="img/vhpl.png" alt="Hospital Bed">
            </div>
        </div>
    </div>
</section>

<section class="ward-furniture-section py-5">
    <div class="container">
        <div class="ward-furniture-header">
            <h2 class="ward-furniture-title">WARD FURNITURE / EQUIPMENT</h2>
            <a href="{{ route('products.byCategory', 9) }}" class="ward-furniture-view-all" style="position: relative; z-index: 10;">VIEW ALL PRODUCTS</a>
        </div>

        <div class="ward-furniture-grid py-5">
            @forelse($ward_furnitures as $furniture)
             @if($loop->first) @continue @endif
                <div class="ward-furniture-card">
                     @if($product->product_discount_price < $product->product_original_price)
                    <div class="ward-furniture-badge">Sale!</div>
                    @endif
                    <img src="{{asset('uploads/products/'.$furniture->product_image)}}"
                         alt="{{$furniture->product_name}}"
                         class="ward-furniture-img">
                    <h3 class="ward-furniture-name">{{$furniture->product_name}}</h3>
                    <p class="ward-furniture-price">
                        <span class="current">{{formatRupees($furniture->product_discount_price)}}</span> -
                        <span class="old">{{formatRupees($furniture->product_original_price)}}</span>
                    </p>
                </div>
            @empty
                <p>No products available</p>
            @endforelse

            @if($ward_furnitures->isNotEmpty())
             @php $promoProduct = $ex_tables->first(); @endphp
            <div class="ward-furniture-promo">
                <p class="ward-furniture-promo-title">EXTRA 9% SAVING ON ORDER</p>

                @php $promoProduct = $ward_furnitures->first(); @endphp
                <p class="ward-furniture-price">
                    <span class="current">{{formatRupees($promoProduct->product_discount_price)}}</span> –
                    <span class="old">{{formatRupees($promoProduct->product_original_price)}}</span>
                </p>
                <a href="{{ route('product.view', $promoProduct->id) }}" class="ward-furniture-shop-btn">SHOP NOW</a>
                <img src="{{ asset('uploads/products/' . $promoProduct->product_image) }}"
                     alt="{{$promoProduct->product_name}}"
                     class="ward-furniture-img">
            </div>
            @endif
        </div>
    </div>
</section>



<section class="examination-tables-section py-5">
    <div class="container">
        <div class="examination-tables-header">
            <h2 class="examination-tables-title">EXAMINATION TABLES</h2>
            <a href="{{ route('products.byCategory','5') }}"
               class="examination-tables-view-all"
               style="position: relative; z-index: 10;">
               VIEW ALL PRODUCTS
            </a>
        </div>

        <div class="examination-tables-grid py-5">
            @if($ex_tables->isNotEmpty())
                @php $promoProduct = $ex_tables->first(); @endphp
                <div class="examination-tables-promo">
                    <p class="examination-tables-promo-title">EXTRA 9% SAVING ON ORDER</p>
                    <p class="examination-tables-price">
                        <span class="current">{{ formatRupees($promoProduct->product_discount_price) }}</span> –
                        <span class="old">{{ formatRupees($promoProduct->product_original_price) }}</span>
                    </p>
                    <a href="{{ route('product.view', $promoProduct->id) }}" class="examination-tables-shop-btn">SHOP NOW</a>
                    <img src="{{ asset('uploads/products/'.$promoProduct->product_image) }}"
                         alt="{{ $promoProduct->product_name }}"
                         class="examination-tables-img">
                </div>
            @endif


            @foreach($ex_tables as $product)
                @if($loop->first) @continue @endif
                <div class="examination-tables-card">
                    @if($product->product_discount_price < $product->product_original_price)
                        <div class="examination-tables-badge">Sale!</div>
                    @endif
                    <img src="{{ asset('uploads/products/'.$product->product_image) }}"
                         alt="{{ $product->product_name }}"
                         class="examination-tables-img">
                    <!-- <p class="examination-tables-category">{{ $product->category->name ?? 'Tables' }}</p> -->
                    <h3 class="examination-tables-name">{{ $product->product_name }}</h3>
                    <p class="examination-tables-price">
                        <span class="current">{{ formatRupees($product->product_discount_price) }}</span>
                        @if($product->product_discount_price < $product->product_original_price)
                            - <span class="old">{{ formatRupees($product->product_original_price) }}</span>
                        @endif
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</section>


<section class="testimonials-section">
    <div class="container">
        <h2 class="testimonials-title">What Our Customers Says?</h2>

        <div class="slider-wrapper py-5">
            <div class="slider" id="slider">
                <div class="card">
                    <div class="stars">★★★★★</div>
                    <p>Lorem ipsum dolor sit amet consectetur. Ultricies ipsum nullam integer orci tellus praesent. Dolor volutpat quis fringilla in pretium est.</p>
                    <div class="profile">
                        <img src="img/user1.jpg" alt="Alexa Milton">
                        <div>
                            <h4>Alexa Milton</h4>
                            <span>Physiotherapist</span>
                        </div>
                    </div>
                    <div class="quote">❝</div>
                </div>
                <div class="card">
                    <div class="stars">★★★★★</div>
                    <p>Lorem ipsum dolor sit amet consectetur. In sed nunc adipiscing hendrerit sed. Orci arcu nunc ullamcorper mi mattis.</p>
                    <div class="profile">
                        <img src="img/user2.jpg" alt="Pelican Steve">
                        <div>
                            <h4>Pelican Steve</h4>
                            <span>Neurologist</span>
                        </div>
                    </div>
                    <div class="quote">❝</div>
                </div>
                <div class="card">
                    <div class="stars">★★★★★</div>
                    <p>More customer feedback goes here with exactly same style as Figma.</p>
                    <div class="profile">
                        <img src="https://via.placeholder.com/50" alt="John Doe">
                        <div>
                            <h4>John Doe</h4>
                            <span>Surgeon</span>
                        </div>
                    </div>
                    <div class="quote">❝</div>
                </div>
                <div class="card">
                    <div class="stars">★★★★★</div>
                    <p>Another testimonial in same style.</p>
                    <div class="profile">
                        <img src="https://via.placeholder.com/50" alt="Jane Smith">
                        <div>
                            <h4>Jane Smith</h4>
                            <span>Cardiologist</span>
                        </div>
                    </div>
                    <div class="quote">❝</div>
                </div>
            </div>
        </div>
        <div class="dots" id="dots"></div>
    </div>
</section>

@endsection

@section('js')
<script>
    let images = document.querySelectorAll('.scroll-img');
    let index = 0;

    function showNextImage() {
        let current = images[index];
        current.classList.remove('active');
        current.classList.add('exit');

        index = (index + 1) % images.length;
        let next = images[index];

        setTimeout(() => {
            current.classList.remove('exit');
            current.style.top = '-100%'; // reset to top for next cycle
            next.classList.add('active');
        }, 1000);
    }

    setInterval(showNextImage, 3000); // 3 seconds per image
</script>

<script>
    const slider = document.getElementById('slider');
    const cards = document.querySelectorAll('.card');
    const dotsContainer = document.getElementById('dots');
    let index = 0;
    let totalPages = Math.ceil(cards.length / 2);

    // Create dots
    for (let i = 0; i < totalPages; i++) {
        const dot = document.createElement('span');
        if (i === 0) dot.classList.add('active');
        dot.addEventListener('click', () => {
            index = i;
            updateSlider();
        });
        dotsContainer.appendChild(dot);
    }

    function updateSlider() {
        slider.style.transform = `translateX(${-index * 100}%)`;
        document.querySelectorAll('.dots span').forEach((dot, i) => {
            dot.classList.toggle('active', i === index);
        });
    }

    function autoSlide() {
        index = (index + 1) % totalPages;
        updateSlider();
    }

    setInterval(autoSlide, 3000);
</script>


<script>
    document.addEventListener('DOMContentLoaded', () => {
        const wrapper = document.querySelector('.category-wrapper'); // scroll container
        const row = wrapper?.querySelector('.category-row'); // inner items
        const arrows = document.querySelectorAll('.category-arrows .arrow-btn');
        const leftBtn = arrows[0];
        const rightBtn = arrows[1];

        if (!wrapper || !row || !leftBtn || !rightBtn) return;

        // scroll amount: 80% of visible area (adjust if you want fixed px)
        const scrollAmount = Math.round(wrapper.clientWidth * 0.8) || 250;

        function updateArrows() {
            // at leftmost?
            leftBtn.disabled = wrapper.scrollLeft <= 0;
            // at rightmost? small tolerance to avoid rounding issues
            rightBtn.disabled = wrapper.scrollLeft + wrapper.clientWidth >= wrapper.scrollWidth - 1;

            leftBtn.classList.toggle('disabled', leftBtn.disabled);
            rightBtn.classList.toggle('disabled', rightBtn.disabled);
        }

        leftBtn.addEventListener('click', () => {
            wrapper.scrollBy({
                left: -scrollAmount,
                behavior: 'smooth'
            });
        });

        rightBtn.addEventListener('click', () => {
            wrapper.scrollBy({
                left: scrollAmount,
                behavior: 'smooth'
            });
        });

        // update button states while user scrolls or window resizes
        wrapper.addEventListener('scroll', updateArrows);
        window.addEventListener('resize', updateArrows);

        // some images might resize after load — give a small timeout for initial calculation
        setTimeout(updateArrows, 120);
    });
</script>

<script>
    $(document).ready(function() {

        $('.wishlist-btn').on('click', function(e) {
            e.preventDefault();

            var button = $(this);
            var productId = button.data('id');

            @if(!Auth::guard('customer') -> check())
            window.location.href = "{{ route('customer.login') }}";
            return;
            @endif

            $.ajax({
                url: "{{ url('customer/wishlist/add') }}/" + productId,
                type: 'POST',
                data: {},
                success: function(data) {
                    if (data.status === 'added') {
                        button.addClass('active');
                    } else {
                        button.removeClass('active');
                    }

                    updateHeaderCounts();
                },
                error: function(err) {
                    console.error(err);
                }
            });

        });

    });


    function updateHeaderCounts() {
        $.ajax({
            url: "{{ route('customer.counts') }}",
            type: "GET",
            success: function(counts) {
                $('.cart-count').text(counts.cartCount);
                $('.wishlist-count').text(counts.wishlistCount);
            }
        });
    }
</script>
@endsection
