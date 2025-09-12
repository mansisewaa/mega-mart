@extends('layouts.app')
<style>
    .contact-section {
        padding: 40px 0;
        background: #f9fafc;
        font-family: 'Outfit', sans-serif;
    }

    .contact-container {
        display: flex;
        justify-content: space-between;
        max-width: 1100px;
        margin: auto;
        gap: 30px;
    }

    .contact-info {
        flex: 1;
        background: #f3f6fb;
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
    }

    .contact-info h2 {
        margin-bottom: 15px;
        font-size: 22px;
        font-weight: bold;
    }

    .contact-info p {
        margin: 10px 0;
        font-size: 15px;
        color: #333;
    }

    .contact-info i {
        margin-right: 8px;
        color: #2874f0;
    }

    .social-icons {
        margin-top: 15px;
    }



    .social-icons a {
        display: inline-block;
        margin-right: 10px;
        background: #fff;
        border-radius: 50%;
        padding: 10px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        color: #333;
    }

    .social-icons a:hover {
        background: #2874f0;
        color: #fff;
    }

    .contact-form-wrapper {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        /* aligns items to the bottom */
        gap: 12px;
        flex: 3;
        background: #f3f6fb;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
        overflow: hidden;
        position: relative;
        /* keep if you have shadows or overflow needs */
    }

    .contact-image {
        flex-shrink: 0;
        /* prevents shrinking */
    }

    .contact-image img {
        width: 350px;
        height: auto;
        border-radius: 0;
    }

    .contactform {
        flex: 1;
    }

    .contactform label {
        display: block;
        margin: 10px 0 5px;
        font-weight: 500;
    }

    .contactform input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 6px;
        margin-bottom: 15px;
    }

    .contactform button {
        display: block;
        width: 100%;
        background: linear-gradient(to right, #2874f0, #5c9eff);
        border: none;
        padding: 9px;
        color: #fff;
        font-size: 14px;
        border-radius: 25px;
        cursor: pointer;
        font-weight: bold;
        margin-top: 5px;
    }

    .contactform button:hover {
        background: linear-gradient(to right, #1f5ec9, #4a8ae6);
    }
</style>
@section('content')

<section class="contact-section">
    <div class="contact-container">

        <!-- Left Side -->
        <div class="contact-info">
            <h2>Contact Us</h2>
            <p><i class="fa fa-map-marker"></i> 2478 Street City Ohio 90255</p>
            <p><i class="fa fa-envelope"></i> info@mediax.com</p>
            <p><i class="fa fa-phone"></i> + (402) 763 282 46</p>

            <div class="social-icons">

                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-linkedin"></i></a>
                <a href="#"><i class="fab fa-whatsapp"></i></a>
            </div>
        </div>

        <!-- Right Side -->
        <div class="contact-form-wrapper">
            <form class="contactform" action="{{route('contact-us-store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <label>Name :</label>
                <input type="text" placeholder="Enter your name" name="name">

                <label>Contact :</label>
                <input type="text" placeholder="Enter your phone" name="contact">

                <label>Email :</label>
                <input type="email" placeholder="Enter your email" name="email">

                <label>Company :</label>
                <input type="text" placeholder="Enter your company" name="company_name">

                <button type="submit">SEND</button>
            </form>

            <!-- Right Side Image -->
            <div class="contact-image">
                <img src="{{asset('img/contact-us-img.png')}}" alt="Support">
            </div>
        </div>

    </div>
</section>

@endsection
@section('js')
@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Query Submitted',
        text: "{{ session('success') }}",
        confirmButtonText: 'OK'
    })
</script>
@endif

@if(session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Error',
        text: "{{ session('error') }}",
        confirmButtonText: 'OK'
    })
</script>
@endif

@endsection
