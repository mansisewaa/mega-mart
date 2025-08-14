<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="robots" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ env('APP_NAME') }}</title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <link href="{{asset('css/bootstrap-icons.css')}}" rel="stylesheet">

    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    @yield('css')
</head>

<body id="section_1">

    <header class="site-header">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 col-12 d-flex flex-wrap">
                    <p class="d-flex me-4 mb-0">
                        <i class="bi-geo-alt me-2" style="margin-top: 0.2rem;"></i>
                        Miljuli Path, Rajib Gandhi Path,
                        Dhopolia, Jyotikuchi, Guwahati,
                    </p>

                    <p class="d-flex mb-0">
                        <i class="bi-envelope me-2" style="margin-top: 0.2rem;"></i>

                        <a href="mailto:valstandhealthcare@gmail.com">
                            valstandhealthcare@gmail.com
                        </a>
                    </p>
                </div>

                <div class="col-lg-3 col-12 ms-auto d-lg-block d-none">
                    <ul class="social-icon">
                        <li class="social-icon-item">
                            <a href="#" class="social-icon-link bi-twitter"></a>
                        </li>

                        <li class="social-icon-item">
                            <a href="#" class="social-icon-link bi-facebook"></a>
                        </li>

                        <!-- <li class="social-icon-item">
                            <a href="#" class="social-icon-link bi-instagram"></a>
                        </li> -->

                        <li class="social-icon-item">
                            <a href="#" class="social-icon-link bi-youtube"></a>
                        </li>

                        <!-- <li class="social-icon-item">
                            <a href="#" class="social-icon-link bi-whatsapp"></a>
                        </li> -->
                    </ul>
                </div>

            </div>
        </div>
    </header>

    <nav class="navbar navbar-expand-lg bg-light shadow-lg">
        <div class="container">
            <a class="navbar-brand" href="javascript:void(0)">
                <img src="images/logo.png" class="logo img-fluid" alt="Kind Heart Charity">
                <!-- <span>
                        Valstand Healthcare Private Limited
                        <small>Innovative Chemical Solutions for Healthcare and Industry</small>
                    </span> -->
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link " href="{{url('/')}}">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " href="{{route('about')}}">About</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('products')}}">Products & Services</a>
                    </li>

                    <li class="nav-item">
                        <!-- <a class="nav-link " href="javascript:void(0);">Certifications</a> -->
                    </li>

                    <!-- <li class="nav-item dropdown">
                            <a class="nav-link click-scroll dropdown-toggle" href="#section_5" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">News</a>

                            <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                                <li><a class="dropdown-item" href="news.html">News Listing</a></li>

                                <li><a class="dropdown-item" href="news-detail.html">News Detail</a></li>
                            </ul>
                        </li> -->

                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="">Contact Us</a>
                    </li>

                    <li class="nav-item ms-3">
                        <a class="nav-link custom-btn custom-border-btn btn" href="{{route('brochure')}}">Brochure</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-12 mb-4">
                    <img src="images/logo.png" class="logo img-fluid" alt="">
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <h5 class="site-footer-title mb-3" style="color: whitesmoke;">Quick Links</h5>

                    <ul class="footer-menu">
                        <li class="footer-menu-item"><a href="javascript:void(0);" class="footer-menu-link">Brochure</a></li>

                        <li class="footer-menu-item"><a href="javascript:void(0);" class="footer-menu-link">Products & Services</a></li>

                        <li class="footer-menu-item"><a href="javascript:void(0);" class="footer-menu-link">Certifications</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6 col-12 mx-auto">
                    <h5 class="site-footer-title mb-3" style="color: whitesmoke;">Contact Infomation</h5>

                    <p class="text-white d-flex mb-2">
                        <i class="bi-telephone me-2"></i>

                        <a href="tel: +91 8638878812" class="site-footer-link">+91 8638878812
                        </a>
                    </p>

                    <p class="text-white d-flex">
                        <i class="bi-envelope me-2"></i>

                        <a href="mailto:info@yourgmail.com" class="site-footer-link">
                            valstandhealthcare@gmail.com
                        </a>
                    </p>

                    <p class="text-white d-flex mt-3">
                        <i class="bi-geo-alt me-2"></i>
                        Bylane 1, Miljuli Path, Rajib Gandhi Path,
                        Dhopolia, Jyotikuchi, Guwahati, Pin-781040
                        Assam, India
                    </p>

                    <a href="https://maps.app.goo.gl/Wmhgs29GZ8Tu8bBp9" class="custom-btn btn mt-3" target="_blank">Get Direction</a>
                </div>
            </div>
        </div>

        <div class="site-footer-bottom">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-md-7 col-12">
                        <p class="copyright-text mb-0">Copyright © 2024 <a href="#">
                                Design: <a href="" target="_blank">Indigi Consulting and Solutions Privaate Limited</a></p>
                    </div>

                    <div class="col-lg-6 col-md-5 col-12 d-flex justify-content-center align-items-center mx-auto">
                        <ul class="social-icon">
                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link bi-twitter"></a>
                            </li>

                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link bi-facebook"></a>
                            </li>

                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link bi-instagram"></a>
                            </li>

                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link bi-linkedin"></a>
                            </li>

                            <li class="social-icon-item">
                                <a href="https://youtube.com/templatemo" class="social-icon-link bi-youtube"></a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </footer>

    <!-- JAVASCRIPT FILES -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/click-scroll.js')}}"></script>
    <script src="{{asset('js/counter.js')}}"></script>
    <script src="{{asset('js/custom.js')}}"></script>
    @yield('js')

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

</body>

</html>
