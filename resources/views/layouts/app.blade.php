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
                <li><a href="#">HOME</a></li>
                <li><a href="#">ABOUT US</a></li>
                <li class="dropdown">
                    <a href="#">PRODUCTS</a>
                    <ul class="dropdown-menu">
                        <li><a href="#">PRODUCT 1</a></li>
                        <li><a href="#">PRODUCT 2</a></li>
                        <li><a href="#">PRODUCT 3</a></li>
                    </ul>
                </li>
                <li><a href="#">CATALOGUE</a></li>
                <li><a href="#">GALLERY</a></li>
                <li><a href="#">CONTACT US</a></li>
            </ul>

            <!-- Icons -->
            <div class="nav-icons">
                <a href="#" class="icon-link">
                    <i class="bi bi-cart"></i>
                    <span class="count">5</span>
                </a>
                <a href="#" class="icon-link">
                    <i class="bi bi-heart"></i>
                    <span class="count">3</span>
                </a>
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
                    <img src="{{asset('images/logo.png  ')}}" class="logo img-fluid" alt="">
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
</body>

</html>
