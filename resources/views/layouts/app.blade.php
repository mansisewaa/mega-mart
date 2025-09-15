<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="robots" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ env('APP_NAME') }}</title>
    <link href="{{asset('css/bootstrap-icons.css')}}" rel="stylesheet">

    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    @yield('css')
</head>

<body id="section_1">
    <header class="site-header">
        <div class="container">
            <div class="row align-items-center custom-product-grid">

                <!-- Logo -->
                <div class="col-lg-3 col-md-3 col-12">
                    <img src="{{asset('img/logo1.png')}}" class="logo img-fluid" alt="Logo">
                </div>

                <!-- Search -->
                <div class="col-lg-5 col-md-5 col-12">
                    <form class="header-search">
                        <input type="text" placeholder="Search Here..." />
                        <button type="submit"><i class="bi bi-search"></i></button>
                    </form>
                </div>

                <!-- Contact Info -->
                <div class="col-lg-4 col-md-4 col-12 d-flex justify-content-end align-items-center header-info">
                    <div class="header-info-bg">
                        <div class="info-box">
                            <i class="bi bi-headset"></i>
                            <div>
                                <small>Contact Us</small><br>
                                <h4 class="info-subtext">+163-654-3569</h4>
                            </div>
                        </div>
                        <div class="info-box">
                            <i class="bi bi-clock"></i>
                            <div>
                                <small>Monday – Saturday</small><br>
                                <h4 class="info-subtext">24/7 Hours Open</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <nav class="navbar">
        <div class="container">

            <!-- Hamburger -->
            <div class="hamburger" onclick="toggleMenu()">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <!-- Nav Menu -->
            <ul class="nav-menu">
                <li>
                    <a href="{{route('index')}}">HOME</a>
                </li>
                @foreach($menus as $menu)
                    @if($menu->slug == 'products')
                        <li>
                            <a href="{{route('products')}}">Products</a>
                        </li>
                    @else
                        <li>
                            <a href="">{{ strtoupper($menu->name) }}</a>
                        </li>
                    @endif
                @endforeach

                <li>
                    <a href="{{route('contact-us')}}">CONTACT US</a>
                </li>
            </ul>

            <!-- Icons -->
            <div class="nav-icons">

                <a href="{{route('customer.cart')}}" class="icon-link">
                    <i class="bi bi-cart"></i>
                    <span class="count cart-count">{{$cartCount}}</span>
                </a>
                <a href="{{route('customer.wishlist')}}" class="icon-link">
                    <i class="bi bi-heart"></i>
                    <span class="count wishlist-count">{{$wishlistCount}}</span>
                </a>
                @if(Auth::guard('customer')->check())
                <div class="dropdown d-inline">
                    <button class="btn-white btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::guard('customer')->user()->name }}
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('customer.dashboard') }}">Dashboard</a></li>
                        <li><a class="dropdown-item" href="{{ route('customer.orders.show') }}">My Orders</a></li>
                        <li><a class="dropdown-item" href="{{ route('customer.wishlist') }}">Wishlist</a></li>
                        <li><a class="dropdown-item" href="{{ route('customer.cart') }}">Cart</a></li>
                        <li>
                            <form method="POST" action="{{ route('customer.logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
                @else
                <a href="{{ route('customer.login') }}" class=" btn-white btn-sm">
                    Login
                </a>
                @endif
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="footer">
        <div class="container">
            <!-- Contact Us -->
            <div class="footer-col">
                <h4>Contact Us</h4>
                <p>Manufacturer of Quality Medical Equipment for Better Healthcare.</p>
                <ul class="contact-info">
                    <li><i class="fa fa-map-marker"></i> 2478 Street City Ohio 90255</li>
                    <li><i class="fa fa-envelope"></i> info@mediax.com</li>
                    <li><i class="fa fa-phone"></i> + (402) 763 282 46</li>
                </ul>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-linkedin"></i></a>
                    <a href="#"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="footer-col">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Terms of Use</a></li>
                    <li><a href="#">Product Catalogue</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
            </div>

            <!-- Popular Categories -->
            <div class="footer-col">
                <h4>Popular Categories</h4>
                <ul>
                    <li><a href="#">Hospital Beds</a></li>
                    <li><a href="#">Infant & Childcare Equipment</a></li>
                    <li><a href="#">Obstetric & Gynecology</a></li>
                    <li><a href="#">Examination Tables</a></li>
                    <li><a href="#">OT Furniture / Trolleys</a></li>
                </ul>
            </div>

            <!-- Newsletter -->
            <div class="footer-col">
                <h4>Let’s Stay In Touch</h4>
                <form class="newsletter">
                    <input type="email" placeholder="Enter Email">
                    <button type="submit"><i class="fa fa-paper-plane"></i></button>
                </form>
            </div>
        </div>


    </footer>
    <div class="footer-bottom">
        <p>Copyright © 2024</p>
        <p>Total Visitor : xxxxxxxx</p>
    </div>

    @if(session('error') || session('success'))
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 1055">
        <div id="liveToast" class="toast align-items-center text-bg-{{ session('error') ? 'danger' : 'success' }} border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    {{ session('error') ?? session('success') }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var toastEl = document.getElementById('liveToast');
            var toast = new bootstrap.Toast(toastEl);
            toast.show();
        });
    </script>
    @endif


    <!-- JAVASCRIPT FILES -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <!-- <script src="{{asset('js/bootstrap.min.js')}}"></script> -->
    <script src="{{asset('js/click-scroll.js')}}"></script>
    <script src="{{asset('js/counter.js')}}"></script>
    <script src="{{asset('js/custom.js')}}"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @yield('js')

    <script>
        function toggleMenu() {
            document.querySelector('.nav-menu').classList.toggle('show');
        }
    </script>

    <script>
        document.getElementById('prev-btn').addEventListener('click', function() {
            const container = document.querySelector('.scrollable-product-container');
            container.scrollBy({
                left: -300,
                behavior: 'smooth'
            }); // Scroll left
        });

        document.getElementById('next-btn').addEventListener('click', function() {
            const container = document.querySelector('.scrollable-product-container');
            container.scrollBy({
                left: 300,
                behavior: 'smooth'
            }); // Scroll right
        });


        document.getElementById('next-btn1').addEventListener('click', function() {
            const scrollContainer = document.querySelector('.certifications-scroll');
            const scrollAmount = 220; // Adjust to the width of the images
            scrollContainer.scrollBy({
                left: scrollAmount,
                behavior: 'smooth'
            });
        });

        document.getElementById('prev-btn1').addEventListener('click', function() {
            const scrollContainer = document.querySelector('.certifications-scroll');
            const scrollAmount = 220; // Adjust to the width of the images
            scrollContainer.scrollBy({
                left: -scrollAmount,
                behavior: 'smooth'
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const carousel = document.getElementById('certifications-carousel');
            const prevBtn = document.getElementById('prev-btn1');
            const nextBtn = document.getElementById('next-btn1');
            const certs = document.querySelectorAll('.cert');

            let scrollPosition = 0;
            const certWidth = certs[0].offsetWidth + 20; // Cert width + margin
            const visibleCerts = Math.floor(carousel.offsetWidth / certWidth);

            function updateScroll() {
                carousel.style.transform = `translateX(-${scrollPosition * certWidth}px)`;
            }

            function autoScroll() {
                scrollPosition = (scrollPosition + 1) % certs.length;
                updateScroll();
            }

            let autoScrollInterval = setInterval(autoScroll, 3000);

            nextBtn.addEventListener('click', () => {
                clearInterval(autoScrollInterval);
                scrollPosition = (scrollPosition + 1) % certs.length;
                updateScroll();
                autoScrollInterval = setInterval(autoScroll, 3000);
            });

            prevBtn.addEventListener('click', () => {
                clearInterval(autoScrollInterval);
                scrollPosition = (scrollPosition - 1 + certs.length) % certs.length;
                updateScroll();
                autoScrollInterval = setInterval(autoScroll, 3000);
            });
        });
    </script>
    <script>
        lightbox.option({
            resizeDuration: 200,
            wrapAround: true,
            fadeDuration: 300,
            imageFadeDuration: 300
        });
    </script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
</body>

</html>
