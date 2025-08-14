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
        <div class="row">
            <div class="col-12 p-0">
                <div id="hero-slide" class="carousel carousel-fade slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($banner as $key => $slider)
                        <div class="carousel-item {{$key == 0 ? 'active' : ''}}">
                            <img src="{{asset('uploads/banner/'.$slider->file)}}" class="carousel-image img-fluid" alt="...">
                        </div>
                        @endforeach
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

<section class="section-bg" id="section_2" style="padding-top: 5rem;">
    <div class="container">
        <div class="row" style="vertical-align:middle;">

            <div class="col-lg-10 col-md-12 col-12 text-center mx-auto">
                <h2 class="mb-5">Welcome to Valstand Healthcare <br />Innovating Patient Care</h2>
            </div>

            <div class="col-lg-6 col-md-6 col-12 ">
                <div class="about-image2">
                    <img src="{{asset('images/aboutus.png')}}" class="custom-text-box-image img-fluid" alt="Group volunteering at a foodbank">

                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-12">
                <div class="custom-text-box">
                    <h2 class="mb-2">About Us</h2>
                    <p class="mb-0">
                        Valstand Healthcare Pvt Ltd is one of India’s leading manufacturers of modern hospital furniture and patient mobility equipment. We specialize in creating durable, innovative, and ergonomic solutions to enhance patient comfort and support medical professionals in delivering optimal care.
                    </p>
                </div>

                <div class="row mt-4">
                    <div class="col-lg-6 col-md-12 col-12 ">
                        <div class="custom-text-box" style="height: auto;">
                            <h5 class="mb-3">Our Purpose</h5>
                            <p>We enhance healthcare with innovative equipment, empower professionals with advanced tools, expand access to quality care, and improve lives through dedicated support.</p>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="custom-text-box" style="height: auto;">
                            <h5 class="mb-3">Our Mission</h5>
                            <p>We strive to lead in medical technology, transform healthcare delivery, ensure access to quality equipment, and foster a patient-centered environment that elevates satisfaction and outcomes.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>



<section class="cert-section" id="section_4">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12 text-center mx-auto">
                <h2 class="mb-5">Our Certifications</h2>
            </div>
            <div class="slider">
                <div class="slide-track">
                    <div class="cert-slide">
                        <img src="images/cer2.png" height="100" width="250" alt="" />
                    </div>
                    <div class="cert-slide">
                        <img src="images/cer3.png" height="100" width="250" alt="" />
                    </div>
                    <div class="cert-slide">
                        <img src="images/cer4.png" height="100" width="250" alt="" />
                    </div>
                    <div class="cert-slide">
                        <img src="images/cer5.png" height="100" width="250" alt="" />
                    </div>
                    <div class="cert-slide">
                        <img src="images/cer6.png" height="100" width="250" alt="" />
                    </div>
                    <div class="cert-slide">
                        <img src="images/cer7.png" height="100" width="250" alt="" />
                    </div>
                    <div class="cert-slide">
                        <img src="images/cer1.png" height="100" width="250" alt="" />
                    </div>
                    <div class="cert-slide">
                        <img src="images/cer2.png" height="100" width="250" alt="" />
                    </div>
                    <div class="cert-slide">
                        <img src="images/cer3.png" height="100" width="250" alt="" />
                    </div>
                    <div class="cert-slide">
                        <img src="images/cer4.png" height="100" width="250" alt="" />
                    </div>
                    <div class="cert-slide">
                        <img src="images/cer5.png" height="100" width="250" alt="" />
                    </div>
                    <div class="cert-slide">
                        <img src="images/cer6.png" height="100" width="250" alt="" />
                    </div>
                    <div class="cert-slide">
                        <img src="images/cer7.png" height="100" width="250" alt="" />
                    </div>
                    <div class="cert-slide">
                        <img src="images/cer1.png" height="100" width="250" alt="" />
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>


<section class="cta-section section-padding" style="background: var(--section-bg-color);">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-12 col-12 ms-auto">
                <h2 class="mb-0 sign" style="text-align:center;">Excellence in Hospital Furniture and Medical Equipment.</h2>
            </div>
        </div>
    </div>
</section>

<section class="about-section" style="padding: 3rem;">
    <div class="container">
        <div class="row align-items-center">

            <!-- Image Column -->
            <div class="col-lg-6 col-md-5 col-12 mb-4 mb-md-0">
                <div class="about-image-wrapper d-flex justify-content-center align-items-center">
                    <img src="images/dir2.png"
                        class="img-fluid rounded"
                        alt="Portrait of Director Biswajyoti Das"
                        style="max-width: 100%; height: auto; object-fit: cover; max-height: 400px;">
                </div>
            </div>

            <!-- Text Column -->
            <div class="col-lg-6 col-md-7 col-12">
                <div class="custom-text-block" style="background-color: #f8f9fa; border-radius: 15px; padding: 1rem; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
                    <h2 class="mb-2">Biswajyoti Das</h2>
                    <p class="mb-3 dir-desig" style="font-weight: 600;"><i>Director</i></p>
                    <p class="text-justify dir-content">
                        Thank you for your continued support.</br>
                        At Valstand Healthcare Pvt Ltd, we are committed to providing high-quality hospital furniture that enhances comfort, safety, and efficiency. Our products are designed with excellence, using premium materials and meticulous craftsmanship.
                        To our valued customers, your satisfaction is our priority, and your feedback helps us improve. To our esteemed dealers, we deeply appreciate your partnership and are dedicated to supporting your success.
                        We are excited about upcoming initiatives to expand our product range, improve customer service, and promote sustainability. Together, we look forward to achieving new milestones. </p>
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


                    @php
                            $products = App\Models\Products::all();
                    @endphp
                    @foreach($products as $product)
                    <div class="product-container">
                        <div class="product-image-container position-relative">
                            <img src="{{ asset('uploads/products/' . $product->product_image) }}"
                                class="product-image img-fluid" alt="Digital Stethoscope">
                        </div>
                        <div class="product-info text-center mt-3">
                            <h5 class="product-title">{{$product->product_name}}</h5>
                        </div>
                    </div>
                    @endforeach

                    <!-- <div class="product-container">
                        <div class="product-image-container position-relative">
                            <img src="{{asset('images/product/delivery.png')}}"
                                class="product-image img-fluid" alt="Digital Stethoscope">
                        </div>
                        <div class="product-info text-center mt-3">
                            <h5 class="product-title">Delivery Beds</h5>
                        </div>
                    </div>

                    <div class="product-container">
                        <div class="product-image-container position-relative">
                            <img src="{{asset('images/product/patient-trolley.jpeg')}}"
                                class="product-image img-fluid" alt="Digital Stethoscope">
                        </div>
                        <div class="product-info text-center mt-3">
                            <h5 class="product-title">Patient Transfer Trolley</h5>
                        </div>
                    </div>

                    <div class="product-container">
                        <div class="product-image-container position-relative">
                            <img src="{{asset('images/product/examination.jpg')}}"
                                class="product-image img-fluid" alt="Digital Stethoscope">
                        </div>
                        <div class="product-info text-center mt-3">
                            <h5 class="product-title">Examination Tables</h5>
                        </div>
                    </div>

                    <div class="product-container">
                        <div class="product-image-container position-relative">
                            <img src="{{asset('images/product/bed-side-locker.jpg')}}"
                                class="product-image img-fluid" alt="Digital Stethoscope">
                        </div>
                        <div class="product-info text-center mt-3">
                            <h5 class="product-title">Ward Furnitures</h5>
                        </div>
                    </div> -->
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
                                <h4 class="carousel-title">Best product at a good price. Owner and staffs are so helpful and provide best service.</h4>
                                <small class="carousel-name"><span class="carousel-name-title">Anil Deb</span></small>
                            </div>
                        </div>

                        <div class="carousel-item">
                            <div class="carousel-caption">
                                <h4 class="carousel-title">Good products</h4>
                                <small class="carousel-name"><span class="carousel-name-title">Liton Mandal</span>, Partner</small>
                            </div>
                        </div>

                        <div class="carousel-item">
                            <div class="carousel-caption">
                                <h4 class="carousel-title">Quality products and service ..</h4>
                                <small class="carousel-name"><span class="carousel-name-title">Pradip Das</span></small>
                            </div>
                        </div>

                        <div class="carousel-item">
                            <div class="carousel-caption">
                                <h4 class="carousel-title">Premium products and reasonable price</h4>
                                <small class="carousel-name"><span class="carousel-name-title">Shehnaz Begum</span></small>
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
                    @php
                        $contact = App\Models\ContactData::latest()->first();
                    @endphp

                    <div class="contact-image-wrap d-flex flex-wrap align-items-center">
                        <img src="images/avatar/pretty-blonde-woman-wearing-white-t-shirt.jpg" class="img-fluid avatar-image" alt="Contact Person Image" style="max-width: 100px;">

                        <div class="d-flex flex-column justify-content-center ms-3">
                            <p class="mb-0">John Doe</p>
                            <p class="mb-0"><strong>Management</strong></p>
                        </div>
                    </div>

                    <div class="contact-info mt-4">
                        <h5 class="mb-3">Contact Information</h5>

                        <p class="align-items-center mb-2" style="word-wrap:normal;">
                            <i class="bi-geo-alt me-2"></i>
                            {{$contact->address ?? ''}}
                        </p>

                        <p class="align-items-center mb-2">
                            <i class="bi-telephone me-2"></i>
                            <a href="tel:+918638878812"> {{$contact->phone_no ??''}}</a>
                        </p>

                        <p class=" align-items-center">
                            <i class="bi-envelope me-2"></i>
                            <a href="mailto:valstandhealthcare@gmail.com"> {{$contact->mail ?? ''}}</a>
                        </p>

                        <a href="https://maps.app.goo.gl/Wmhgs29GZ8Tu8bBp9" class="custom-btn custom-border-btn btn mt-3">Get Directions</a>
                    </div>
                </div>
            </div>

            <!-- Contact Form Section -->
            <div class="col-lg-6 col-md-12 col-12 mx-auto">
                <form class="custom-form contact-form" action="{{route('submit-contact')}}" method="post" role="form">
                    @csrf
                    <h2>Contact Form</h2>
                    <p class="mb-4" style="color:red;">Or, you can just send an email to: <a href="mailto:valstandhealthcare@gmail.com">valstandhealthcare@gmail.com</a></p>

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
