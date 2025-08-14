@extends('layouts.app')
<style>
      .hero-section {
        height:70vh !important; /* Reduce section height */
    }

    .hero-section .carousel-image {
        height: 78vh !important; /* Match image height to section */
        /* object-fit: cover; Ensure the image fits well */
    }

    .carousel-caption {
        bottom: 20% !important; /* Adjust caption position */
    }

    h1 {
        font-size: 2rem !important; /* Adjust heading size */
    }

    p {
        font-size: 1rem !important; /* Adjust paragraph size */
    }

    .certifications-scroll-wrapper {
            overflow: hidden;
            position: relative;
        }

        .certifications-scroll {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .cert {
            flex: 0 0 auto;
            width: 200px;
            margin: 0 10px;
        }

        .scroll-button {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            z-index: 10;
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
        }

        .left-btn1 {
            left: 0;
        }

        .right-btn1 {
            right: 0;
        }

        .featured-block img {
            max-width: 100%;
            border-radius: 8px;
        }
</style>
@section('content')
<section class="hero-section hero-section-full-height">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-12 p-0">
                <div id="hero-slide" class="carousel carousel-fade slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($banner as $key => $slider)
                        <div class="carousel-item {{$key == 0 ? 'active' : ''}}">
                            <img src="{{asset('uploads/banner/'.$slider->file)}}" class="carousel-image img-fluid" alt="...">
                            <!-- <div class="carousel-caption d-flex flex-column justify-content-end">
                                <h1>{{$slider->title}}</h1>
                                <p>{{$slider->description}}</p>
                            </div> -->
                        </div>
                        @endforeach)
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#hero-slide" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#hero-slide" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>


<section class=" section-padding section-bg" id="section_2">
    <div class="container">
        <div class="row">

            <div class="col-lg-10 col-12 text-center mx-auto">
                <h2 class="mb-5">Welcome to Valstand Healthcare <br />Innovating Patient Care</h2>
            </div>


            <div class="col-lg-6 col-12 mb-5 mb-lg-0">
                <img src="images/group-people-volunteering-foodbank-poor-people.jpg" class="custom-text-box-image img-fluid" alt="">
            </div>

            <div class="col-lg-6 col-12">
                <div class="custom-text-box">
                    <h2 class="mb-2" style="font-size: 33px;">About Valstand Healthcare</h2>

                    <p class="mb-0" style="text-align:justify;">
                        Valstand Healthcare Pvt Ltd is one of India’s leading manufacturers of modern hospital furniture and patient mobility equipment. We specialize in creating durable, innovative, and ergonomic solutions to enhance patient comfort and support medical professionals in delivering optimal care.
                    </p>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="custom-text-box mb-lg-0" style="height: 17rem;">
                            <h5 class="mb-3">Our Purpose</h5>
                            <p>We enhance healthcare with innovative equipment, empower professionals with advanced tools, expand access to quality care, and improve lives through dedicated support.</p>

                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="custom-text-box d-flex flex-wrap d-lg-block mb-lg-0" style="height: 17rem;">
                            <h5 class="mb-3">Our Mission</h5>
                            <p>We strive to lead in medical technology, transform healthcare delivery, ensure access to quality equipment, and for a patient-centered environment that elevates satisfaction and outcomes.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="section-padding" id="section_4">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-12 text-center mx-auto">
                <h2 class="mb-5">Our Certifications</h2>
            </div>

            <div class="col-lg-12 col-12">
                <div class="certifications-scroll-wrapper position-relative">
                    <button class="scroll-button left-btn1" id="prev-btn1">&#8249;</button>

                    <div class="certifications-scroll d-flex" id="certifications-carousel">
                        <!-- Certification Images -->
                        <div class="cert">
                            <div class="featured-block d-flex justify-content-center align-items-center">
                                <a href="#" class="d-block">
                                    <img src="images/cer2.png" class="featured-block-image img-fluid" alt="Certification 2">
                                </a>
                            </div>
                        </div>

                        <div class="cert">
                            <div class="featured-block d-flex justify-content-center align-items-center">
                                <a href="#" class="d-block">
                                    <img src="images/cer3.png" class="featured-block-image img-fluid" alt="Certification 3">
                                </a>
                            </div>
                        </div>

                        <div class="cert">
                            <div class="featured-block d-flex justify-content-center align-items-center">
                                <a href="#" class="d-block">
                                    <img src="images/cer4.png" class="featured-block-image img-fluid" alt="Certification 4">
                                </a>
                            </div>
                        </div>

                        <div class="cert">
                            <div class="featured-block d-flex justify-content-center align-items-center">
                                <a href="#" class="d-block">
                                    <img src="images/cer5.png" class="featured-block-image img-fluid" alt="Certification 5">
                                </a>
                            </div>
                        </div>

                        <div class="cert">
                            <div class="featured-block d-flex justify-content-center align-items-center">
                                <a href="#" class="d-block">
                                    <img src="images/cer6.png" class="featured-block-image img-fluid" alt="Certification 6">
                                </a>
                            </div>
                        </div>

                        <div class="cert">
                            <div class="featured-block d-flex justify-content-center align-items-center">
                                <a href="#" class="d-block">
                                    <img src="images/cer7.png" class="featured-block-image img-fluid" alt="Certification 7">
                                </a>
                            </div>
                        </div>

                        <div class="cert">
                            <div class="featured-block d-flex justify-content-center align-items-center">
                                <a href="#" class="d-block">
                                    <img src="images/cer1.png" class="featured-block-image img-fluid" alt="Certification 1">
                                </a>
                            </div>
                        </div>
                    </div>
                    <button class="scroll-button right-btn1" id="next-btn1">&#8250;</button>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="cta-section section-padding section-bg">
    <div class="container">
        <div class="row justify-content-center align-items-center">

            <div class="col-lg-12 col-12 ms-auto">
                <h2 class="mb-0" style="font-size:40px;text-align:center;">Excellence in Hospital Furniture and Medical Equipment.</h2>
            </div>
        </div>
    </div>
</section>

<section class="about-section" style="padding:3rem;">
    <div class="container">
        <div class="row align-items-center">

            <!-- Image Column -->
            <div class="col-lg-6 col-md-5 col-12 mb-4 mb-md-0">
                <img src="images/dir2.png"
                    class="about-image ms-lg-auto bg-light shadow-lg img-fluid w-100 rounded"
                    alt="Director Image" style="max-width: 29rem;height: 400px;">
            </div>

            <!-- Text Column -->
            <div class="col-lg-6 col-md-7 col-12">
                <div class="custom-text-block">
                    <h2 class="mb-2">Biswajyoti Das</h2>
                    <p class="mb-3" style="font-weight: 600;"><i>Director</i></p>
                    <p class="text-justify">
                        Thank you for your continued support. <br>
                        At Valstand Healthcare Pvt Ltd, we are committed to providing high-quality hospital furniture that enhances comfort and efficiency in healthcare settings. Your satisfaction is our priority, and we appreciate your feedback.
                        To our dealers, your partnership is vital to our success, and we are here to support you. We look forward to new initiatives aimed at expanding our product range and improving customer service.
                        Thank you for your unwavering support as we achieve new milestones together.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="p-5" id="section_3" style="background: var(--section-bg-color);">
    <div class="container">
        <div class="row g-3">
            <div class="col-lg-12 col-12 text-center d-flex justify-content-center mb-1">
                <h2>Products</h2>
            </div>

            <!-- Scrollable Product Container -->
            <div class="product-scroll-container">
                <button class="scroll-button left-btn" id="prev-btn">&#8249;</button> <!-- Left Button -->
                <div class="scrollable-product-container">
                    <!-- Product 1 -->
                    <div class="product-container">
                        <div class="product-image-container position-relative">
                            <img src="{{asset('images/product/hospital.png')}}"
                                class="product-image img-fluid" alt="Digital Stethoscope">
                        </div>
                        <div class="product-info text-center mt-3">
                            <h5 class="product-title">Hospital Beds</h5>
                        </div>
                    </div>

                    <!-- Product 2 -->
                    <div class="product-container">
                        <div class="product-image-container position-relative">
                            <img src="{{asset('images/product/delivery.png')}}"
                                class="product-image img-fluid" alt="Digital Stethoscope">
                        </div>
                        <div class="product-info text-center mt-3">
                            <h5 class="product-title">Delivery Beds</h5>
                        </div>
                    </div>

                    <!-- Product 3 -->
                    <div class="product-container">
                        <div class="product-image-container position-relative">
                            <img src="{{asset('images/product/patient-trolley.jpeg')}}"
                                class="product-image img-fluid" alt="Digital Stethoscope">
                        </div>
                        <div class="product-info text-center mt-3">
                            <h5 class="product-title">Patient Transfer Trolley</h5>
                        </div>
                    </div>

                    <!-- Product 4 -->
                    <div class="product-container">
                        <div class="product-image-container position-relative">
                            <img src="{{asset('images/product/examination.jpg')}}"
                                class="product-image img-fluid" alt="Digital Stethoscope">
                        </div>
                        <div class="product-info text-center mt-3">
                            <h5 class="product-title">Examination Tables</h5>
                        </div>
                    </div>

                    <!-- Product 5 -->
                    <div class="product-container">
                        <div class="product-image-container position-relative">
                            <img src="{{asset('images/product/bed-side-locker.jpg')}}"
                                class="product-image img-fluid" alt="Digital Stethoscope">
                        </div>
                        <div class="product-info text-center mt-3">
                            <h5 class="product-title">Ward Furnitures</h5>
                        </div>
                    </div>
                </div>
                <button class="scroll-button right-btn" id="next-btn">&#8250;</button> <!-- Right Button -->
            </div>
        </div>
    </div>
</section>



<section class="testimonial-section section-padding">
    <div class="container">
        <div class="row">

            <div class="col-lg-8 col-12 mx-auto">
                <h2 class="mb-lg-3">Happy Customers</h2>

                <div id="testimonial-carousel" class="carousel carousel-fade slide" data-bs-ride="carousel">

                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="carousel-caption">
                                <h4 class="carousel-title">Lorem Ipsum dolor sit amet, consectetur adipsicing kengan omeg kohm tokito charity theme</h4>

                                {{-- <small class="carousel-name"><span class="carousel-name-title">Maria</span>, Boss</small> --}}
                            </div>
                        </div>

                        <div class="carousel-item">
                            <div class="carousel-caption">
                                <h4 class="carousel-title">Sed leo nisl, posuere at molestie ac, suscipit auctor mauris quis metus tempor orci</h4>

                                {{-- <small class="carousel-name"><span class="carousel-name-title">Thomas</span>, Partner</small> --}}
                            </div>
                        </div>

                        <div class="carousel-item">
                            <div class="carousel-caption">
                                <h4 class="carousel-title">Lorem Ipsum dolor sit amet, consectetur adipsicing kengan omeg kohm tokito charity theme</h4>

                                {{-- <small class="carousel-name"><span class="carousel-name-title">Jane</span>, Advisor</small> --}}
                            </div>
                        </div>

                        <div class="carousel-item">
                            <div class="carousel-caption">
                                <h4 class="carousel-title">Sed leo nisl, posuere at molestie ac, suscipit auctor mauris quis metus tempor orci</h4>

                                {{-- <small class="carousel-name"><span class="carousel-name-title">Bob</span>, Entreprenuer</small> --}}
                            </div>
                        </div>

                        <ol class="carousel-indicators">
                            <li data-bs-target="#testimonial-carousel" data-bs-slide-to="0" class="active">
                                <img src="images/avatar/portrait-beautiful-young-woman-standing-grey-wall.jpg" class="img-fluid rounded-circle avatar-image" alt="avatar">
                            </li>

                            <li data-bs-target="#testimonial-carousel" data-bs-slide-to="1" class="">
                                <img src="images/avatar/portrait-young-redhead-bearded-male.jpg" class="img-fluid rounded-circle avatar-image" alt="avatar">
                            </li>

                            <li data-bs-target="#testimonial-carousel" data-bs-slide-to="2" class="">
                                <img src="images/avatar/pretty-blonde-woman-wearing-white-t-shirt.jpg" class="img-fluid rounded-circle avatar-image" alt="avatar">
                            </li>

                            <li data-bs-target="#testimonial-carousel" data-bs-slide-to="3" class="">
                                <img src="images/avatar/studio-portrait-emotional-happy-funny.jpg" class="img-fluid rounded-circle avatar-image" alt="avatar">
                            </li>
                        </ol>

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="section-padding section-bg" id="section_6">
    <div class="container">
        <div class="row">
            <!-- Contact Info Section -->
            <div class="col-lg-6 col-md-12 col-12 ms-auto mb-5 mb-lg-0">
                <div class="contact-info-wrap">
                    <h2>Get in Touch</h2>

                    <div class="contact-image-wrap d-flex flex-wrap align-items-center">
                        <img src="images/avatar/pretty-blonde-woman-wearing-white-t-shirt.jpg" class="img-fluid avatar-image" alt="Contact Person Image" style="max-width: 100px;">

                        <div class="d-flex flex-column justify-content-center ms-3">
                            <p class="mb-0">John Doe</p>
                            <p class="mb-0"><strong>Position</strong></p>
                        </div>
                    </div>

                    <div class="contact-info mt-4">
                        <h5 class="mb-3">Contact Information</h5>

                        <p class="align-items-center mb-2">
                            <i class="bi-geo-alt me-2"></i>
                            Bylane 1, Miljuli Path, Rajib Gandhi Path, Dhopolia, Jyotikuchi, Guwahati, Assam, India, Pin-781040
                        </p>

                        <p class="align-items-center mb-2">
                            <i class="bi-telephone me-2"></i>
                            <a href="tel:+918638878812">+91 8638878812</a>
                        </p>

                        <p class=" align-items-center">
                            <i class="bi-envelope me-2"></i>
                            <a href="mailto:valstandhealthcare@gmail.com"> valstandhealthcare@gmail.com</a>
                        </p>

                        <a href="https://maps.app.goo.gl/Wmhgs29GZ8Tu8bBp9" class="custom-btn custom-border-btn btn mt-3">Get Directions</a>
                    </div>
                </div>
            </div>

            <!-- Contact Form Section -->
            <div class="col-lg-6 col-md-12 col-12 mx-auto">
                <form class="custom-form contact-form" action="#" method="post" role="form">
                    <h2>Contact Form</h2>
                    <p class="mb-4">Or, you can just send an email to: <a href="mailto:valstandhealthcare@gmail.com">valstandhealthcare@gmail.com</a></p>

                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12 mb-3">
                            <input type="text" name="first-name" id="first-name" class="form-control" placeholder="First Name" required>
                        </div>

                        <div class="col-lg-6 col-md-6 col-12 mb-3">
                            <input type="text" name="last-name" id="last-name" class="form-control" placeholder="Last Name" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email Address" required>
                    </div>

                    <div class="mb-3">
                        <textarea name="message" rows="5" class="form-control" id="message" placeholder="What can we help you with?" required></textarea>
                    </div>

                    <button type="submit" class="form-control btn custom-btn custom-border-btn" style="background-color: #0d1192c9;">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
