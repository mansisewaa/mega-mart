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

        <div class="row g-3 category-row ">

            <!-- Category 1 -->
            <div class="col-auto">
                <div class="category-card">
                    <img src="img/product1.png" alt="Hospital Beds">
                    <h3 class="category-title">Hospital Beds</h3>
                </div>
            </div>

            <!-- Category 2 -->
            <div class="col-auto">
                <div class="category-card">
                    <img src="img/product1.png" alt="Infant & Childcare Equipment">
                    <h3 class="category-title">Infant & Childcare Equipment</h3>
                </div>
            </div>

            <!-- Category 3 -->
            <div class="col-auto">
                <div class="category-card">
                    <img src="img/product1.png" alt="Obstetric & Gynecology">
                    <h3 class="category-title">Obstetric & Gynecology</h3>
                </div>
            </div>

            <!-- Category 4 -->
            <div class="col-auto">
                <div class="category-card">
                    <img src="img/product1.png" alt="Emergency & Recovery">
                    <h3 class="category-title">Emergency & Recovery</h3>
                </div>
            </div>

            <!-- Category 5 -->
            <div class="col-auto">
                <div class="category-card">
                    <img src="img/product1.png" alt="Examination Tables">
                    <h3 class="category-title">Examination Tables</h3>
                </div>
            </div>

            <!-- Category 6 -->
            <div class="col-auto">
                <div class="category-card">
                    <img src="img/product1.png" alt="OT Furniture / Trolleys">
                    <h3 class="category-title">OT Furniture / Trolleys</h3>
                </div>
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
                <button class="custom-filter-btn">BEST SELLING</button>
            </div>
        </div>

        <div class="row g-4 py-5 customer-product-grid">
            <!-- Product Card -->
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="custom-product-card">
                    <span class="custom-sale-badge">Sale!</span>
                    <div class="custom-product-actions">
                        <button class="custom-icon-btn">♡</button>
                        <button class="custom-icon-btn">👁</button>
                    </div>
                    <img src="img/product1.png" alt="Product" class="custom-product-img">
                    <button class="custom-cart-btn">Add To Cart</button>
                    <p class="custom-product-category">Category</p>
                    <h3 class="custom-product-name">Product 1</h3>
                    <div class="custom-product-price">
                        <span class="custom-new-price">$20.00</span>
                        <span class="custom-old-price">$30.00</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="custom-product-card">
                    <span class="custom-sale-badge">Sale!</span>
                    <div class="custom-product-actions">
                        <button class="custom-icon-btn">♡</button>
                        <button class="custom-icon-btn">👁</button>
                    </div>
                    <img src="img/product1.png" alt="Product" class="custom-product-img">
                    <button class="custom-cart-btn">Add To Cart</button>
                    <p class="custom-product-category">Category</p>
                    <h3 class="custom-product-name">Product 1</h3>
                    <div class="custom-product-price">
                        <span class="custom-new-price">$20.00</span>
                        <span class="custom-old-price">$30.00</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="custom-product-card">
                    <!-- <span class="custom-sale-badge">Sale!</span> -->
                    <div class="custom-product-actions">
                        <button class="custom-icon-btn">♡</button>
                        <button class="custom-icon-btn">👁</button>
                    </div>
                    <img src="img/product1.png" alt="Product" class="custom-product-img">
                    <button class="custom-cart-btn">Add To Cart</button>
                    <p class="custom-product-category">Category</p>
                    <h3 class="custom-product-name">Product 1</h3>
                    <div class="custom-product-price">
                        <span class="custom-new-price">$20.00</span>
                        <span class="custom-old-price">$30.00</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="custom-product-card">
                    <!-- <span class="custom-sale-badge">Sale!</span> -->
                    <div class="custom-product-actions">
                        <button class="custom-icon-btn">♡</button>
                        <button class="custom-icon-btn">👁</button>
                    </div>
                    <img src="img/product1.png" alt="Product" class="custom-product-img">
                    <button class="custom-cart-btn">Add To Cart</button>
                    <p class="custom-product-category">Category</p>
                    <h3 class="custom-product-name">Product 1</h3>
                    <div class="custom-product-price">
                        <span class="custom-new-price">$20.00</span>
                        <span class="custom-old-price">$30.00</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="custom-product-card">
                    <!-- <span class="custom-sale-badge">Sale!</span> -->
                    <div class="custom-product-actions">
                        <button class="custom-icon-btn">♡</button>
                        <button class="custom-icon-btn">👁</button>
                    </div>
                    <img src="img/product1.png" alt="Product" class="custom-product-img">
                    <button class="custom-cart-btn">Add To Cart</button>
                    <p class="custom-product-category">Category</p>
                    <h3 class="custom-product-name">Product 1</h3>
                    <div class="custom-product-price">
                        <span class="custom-new-price">$20.00</span>
                        <span class="custom-old-price">$30.00</span>
                    </div>
                </div>
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
            <a href="#" class="ward-furniture-view-all">VIEW ALL PRODUCTS</a>
        </div>

        <div class="ward-furniture-grid py-5">
            <!-- Product Card -->
            <div class="ward-furniture-card">
                <div class="ward-furniture-badge">Sale!</div>
                <img src="img/ward_furniture1.png" alt="Product 1" class="ward-furniture-img">
                <p class="ward-furniture-category">Accessories</p>
                <h3 class="ward-furniture-name">Product 1</h3>
                <p class="ward-furniture-price"><span class="current">$20.00</span> - <span class="old">$30.00</span></p>
            </div>

            <div class="ward-furniture-card">
                <img src="img/ward_furniture4.png" alt="Product 2" class="ward-furniture-img">
                <p class="ward-furniture-category">Medicine</p>
                <h3 class="ward-furniture-name">Product 1</h3>
                <p class="ward-furniture-price"><span class="current">$39.85</span></p>
            </div>

            <div class="ward-furniture-card">
                <img src="img/ward_furniture3.png" alt="Product 3" class="ward-furniture-img">
                <p class="ward-furniture-category">Equipment</p>
                <h3 class="ward-furniture-name">Product 1</h3>
                <p class="ward-furniture-price"><span class="current">$96.85</span></p>
            </div>

            <!-- Promo Card -->
            <div class="ward-furniture-promo">
                <p class="ward-furniture-promo-title">EXTRA 9% SAVING ON ORDER</p>
                <p class="ward-furniture-price">
                    <span class="current">$80.00</span> – <span class="old">$120.00</span>
                </p>
                <a href="#" class="ward-furniture-shop-btn">SHOP NOW</a>
                <img src="img/ward_furniture2.png" alt="Promo Product" class="ward-furniture-img">
            </div>
        </div>
    </div>
</section>


<section class="examination-tables-section py-5">
    <div class="container">
        <div class="examination-tables-header">
            <h2 class="examination-tables-title">EXAMINATION TABLES</h2>
            <a href="#" class="examination-tables-view-all">VIEW ALL PRODUCTS</a>
        </div>

        <div class="examination-tables-grid py-5">
            <!-- Promo Card (Left Side) -->
            <div class="examination-tables-promo">
                <p class="examination-tables-promo-title">EXTRA 9% SAVING ON ORDER</p>
                <p class="examination-tables-price">
                    <span class="current">$150.00</span> – <span class="old">$200.00</span>
                </p>
                <a href="#" class="examination-tables-shop-btn">SHOP NOW</a>
                <img src="img/exm_tables4.png" alt="Promo Product" class="examination-tables-img">
            </div>

            <!-- Product Card 1 -->
            <div class="examination-tables-card">
                <div class="examination-tables-badge">Sale!</div>
                <img src="img/exm_tables1.png" alt="Product 1" class="examination-tables-img">
                <p class="examination-tables-category">Tables</p>
                <h3 class="examination-tables-name">Product 1</h3>
                <p class="examination-tables-price"><span class="current">$120.00</span> - <span class="old">$150.00</span></p>
            </div>

            <!-- Product Card 2 -->
            <div class="examination-tables-card">
                <img src="img/exm_tables2.png" alt="Product 2" class="examination-tables-img">
                <p class="examination-tables-category">Tables</p>
                <h3 class="examination-tables-name">Product 2</h3>
                <p class="examination-tables-price"><span class="current">$180.00</span></p>
            </div>

            <!-- Product Card 3 -->
            <div class="examination-tables-card">
                <img src="img/exm_tables3.png" alt="Product 3" class="examination-tables-img">
                <p class="examination-tables-category">Tables</p>
                <h3 class="examination-tables-name">Product 3</h3>
                <p class="examination-tables-price"><span class="current">$200.00</span></p>
            </div>
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







@endsection
