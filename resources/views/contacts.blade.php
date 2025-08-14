@extends('layouts.app')
<style>
   .banner-section {
    background-image: url('images/bannerbg7.jpg');
    background-size: cover;  /* Ensures the image covers the entire section */
    background-position: center; /* Centers the background image */
    background-repeat: no-repeat; /* Prevents the image from repeating */
    color: #fff;
    text-align: center;
    padding: 90px 30px;
}

    .banner-section h1 {
        margin: 0;
        font-size: 3rem;
    }

    .banner-section p {
        font-size: 1.2rem;
        margin: 15px 0 0;
    }

    .contact-section {
        padding: 60px 30px;
    }

    .contact-container {
        max-width: 900px;
        margin: auto;
        padding: 50px 20px;
    }

    .contact-info {
        padding: 20px;
    }

    .contact-info h5 {
        /* font-weight: bold; */
        font-size: 17px;
    }

    .contact-info h4 {
        margin-left: 10px;
    }

    .contact-form {
        background: #f8f9fa;
        padding: 30px;
        border-radius: 8px;
        margin-top: 1rem;
    }

    .btn-primary {
        background-color: #a51d2d;
        border: none;
    }

    .btn-primary:hover {
        background-color: #871620;
    }

    .icon-box {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
    }

    .icon-box i {
        font-size: 27px;
        color: #a51d2d;
        margin-right: 10px;
        margin-bottom: 2rem;
    }
</style>
@section('content')
<section class="banner-section">
    <div class="container">
        <h1>Contact Us</h1>
    </div>
</section>
<section class="contact-section">
    <div class="container content">
        <div class="container contact-container">
            <!-- <h2 class="text-center text-danger">Contact Us</h2> -->
            <!-- <p class="text-center">Valstand Healthcare Pvt Ltd is one of India’s leading manufacturers of modern hospital furniture and patient mobility equipment.</p>
            </p> -->
            <div class="row">
                <div class="col-md-6 contact-info">
                    <h4>Committed to Excellence in Healthcare Solutions</h4>
                    <div class="icon-box">
                        <i class="bi bi-geo-alt-fill"></i>
                        <div>
                            <h5>Visit Us:</h5>
                            <p>Bylane 1, Miljuli Path, Rajib Gandhi Path, Dhopolia, Jyotikuchi, Guwahati, Assam, India, Pin-781040</p>
                        </div>
                    </div>
                    <div class="icon-box">
                        <i class="bi bi-envelope-fill"></i>
                        <div>
                            <h5>Mail Us:</h5>
                            <p>valstandhealthcare@gmail.com</p>
                        </div>
                    </div>
                    <div class="icon-box">
                        <i class="bi bi-telephone-fill"></i>
                        <div>
                            <h5>Call Us:</h5>
                            <p>+91 8638878812</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="contact-form">
                        <form method="POST" action="{{route('submit-contact')}}" enctype="multipart/form-data">
                            @csrf
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

                    <button type="submit" class="form-control btn btn-sm btn-primary" style="color:#4043a9 ;">Send Message</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
