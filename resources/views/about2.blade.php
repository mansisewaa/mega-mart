@extends('layouts.app')
<style>
    .banner-section {
        background-color: #3f42a8;
        color: #fff;
        text-align: center;
        padding: 60px 30px;
    }

    .banner-section h1 {
        margin: 0;
        font-size: 3rem;
    }

    .banner-section p {
        font-size: 1.2rem;
        margin: 15px 0 0;
    }

    .about-section,
    .mission-section,
    .features-section,
    .promise-section {
        padding: 50px 20px;
    }

    .about-content,
    .mission-content {
        display: flex;
        align-items: center;
        gap: 20px;
        flex-wrap: wrap;
    }

    .about-image img,
    .mission-image img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        /* Adds subtle shadow around the image */
        transition: transform 0.3s ease-in-out;
        /* Smooth transition for hover effect */
    }

    /* Optional: Add hover effect */
    .about-image img:hover,
    .mission-image img:hover {
        transform: scale(1.05);
        /* Slight zoom effect when hovering over the image */
    }

    .features-grid {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 20px;
    }

    .feature-card {
        flex: 1 1 calc(33.333% - 20px);
        border: 1px solid #ddd;
        border-radius: 8px;
        text-align: center;
        padding: 20px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .feature-card img {
        max-width: 80%;
        height: 60%;
        border-radius: 8px;
    }

    .feature-card h3 {
        font-size: 1.5rem;
        margin: 25px 0 4px;
        color: #3f42a8;
    }

    h2 {
        color: #3f42a8;
        text-align: center;
        margin-bottom: 20px;
        font-size: 2rem !important;
    }

    p {
        color: #555;
    }

    .about-section {
        padding: 40px 0;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
    }

    .about-content {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 40px;
        padding: 40px;
        /* Adds padding around the content for better spacing */
        /* border-radius: 10px; Rounded corners for the container */
        /* background-color: #f9f9f9; */
        /* Light background color for the section */
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        /* Subtle shadow around the section */
    }

    .about-text {
        flex: 1;
        padding-right: 20px;
        text-align: justify;
        /* Justifies the text to give it a clean look */
        line-height: 1.6;
        /* Increases line height for better readability */
        font-size: 1.1em;
        /* Slightly larger text for better legibility */
        color: #333;
        /* Dark text for readability */
    }

    @media (max-width: 768px) {
        .about-content {
            flex-direction: column;
            align-items: flex-start;
            padding: 15px;
        }

        .about-text {
            padding-right: 0;
            /* Remove right padding on smaller screens */
        }
    }

    /* .about-image {
        flex: 1;
        padding: 30px;
    }

    .about-image img {
        width: 85%;
        height: auto;
    }*/

    @media (max-width: 768px) {
        .about-content {
            flex-direction: column;
            align-items: flex-start;
        }

        .about-text,
        .about-image {
            padding: 0;
            margin-bottom: 20px;
        }
    }

    .about-image {
        flex: 1;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 30px;
    }

    .about-image img {
        width: 85%;
        height: auto;
    }
</style>


@section('content')
<section class="banner-section">
    <div class="container">
        <h1>Welcome to Valstand Healthcare</h1>
        <p style="color: #ddd;">Innovative Healthcare Furniture for Modern Medical Facilities</p>
    </div>
</section>
<section class="about-section">
    <div class="container">
        <!-- First Grid -->
        <div class="about-content">
            <div class="about-text">
                <h2>About Us</h2>
                <p>At Valstand Healthcare, we are committed to delivering excellence in healthcare solutions. As one of India’s leading manufacturers of medical supplies and mobility equipment, we specialize in modern hospital furniture, offering both standard and bespoke designs to meet industry needs.</p>
                <p>With a state-of-the-art facility and expert R&D team, we create durable, efficient, and comfortable furniture for patients and healthcare professionals. Rigorous testing ensures flawless, cost-effective products that elevate healthcare services with quality and innovation.</p>
            </div>
            <div class="about-image">
                <img src="{{asset('images/aboutus.png')}}" alt="Healthcare solutions">
            </div>
        </div>

        <!-- Second Grid -->
        <div class="about-content">
            <div class="about-image">
                <img src="{{asset('images/mission2.jpeg')}}" alt="Medical supplies">
            </div>
            <div class="about-text">
                <h2>Our Mission</h2>
                <p>Our mission is to provide healthcare solutions that are innovative, reliable, and affordable. By leveraging the latest technologies and design trends, we aim to improve the quality of care and enhance patient comfort and mobility.</p>
                <p>We strive to be a trusted partner for hospitals, clinics, and medical professionals by consistently delivering products that exceed expectations in both performance and quality.</p>
            </div>
        </div>
    </div>
</section>


<section class="features-section">
    <div class="container">
        <h2>What We Offer</h2>
        <div class="features-grid">
            <div class="feature-card">
                <img src="{{asset('images/furniture.png')}}" alt="Modern furniture">
                <h3>Modern Hospital Furniture</h3>
                <p>Standard and bespoke designs tailored to meet the diverse needs of the medical industry.</p>
            </div>
            <div class="feature-card">
                <img src="{{asset('images/patient-care.jpg')}}" alt="Patient care solutions">
                <h3>Patient Care Solutions</h3>
                <p>Specialized furniture created with precision by our expert R&D team, ensuring superior performance.</p>
            </div>
            <div class="feature-card">
                <img src="{{asset('images/manufacter.webp')}}" alt="Infrastructure">
                <h3>Comprehensive Manufacturing</h3>
                <p>State-of-the-art tools and infrastructure ensure flawless production and efficient delivery.</p>
            </div>
        </div>
    </div>
</section>
<!--
<section class="promise-section">
    <div class="container">
        <h2>Our Promise</h2>
        <p>Every product undergoes rigorous testing to ensure defect-free results and exceptional finishing, all while keeping affordability in mind. By prioritizing quality and fair pricing, we strive to make healthcare solutions accessible to all.</p>
    </div>
</section> -->
@endsection
