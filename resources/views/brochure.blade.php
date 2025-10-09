@extends('layouts.app')
<style>
    .brochure-section {
        padding: 40px 0;
        background: #f9fafc;
        font-family: 'Outfit', sans-serif;
    }

    .brochure-container {
        display: flex;
        justify-content: space-between;
        max-width: 1100px;
        margin: auto;
        gap: 20px;
    }

    .brochure-info {
        flex: 1;
        background: #f3f6fb;
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
    }

    .brochure-info h2 {
        margin-bottom: 15px;
        font-size: 22px;
        font-weight: bold;
    }

    .brochure-info p {
        margin: 8px 0;
        font-size: 14px;
        color: #333;
    }

    .brochure-info i {
        margin-right: 6px;
        color: #e40001;
    }

    .brochure-form-wrapper {
        flex: 1.4; /* smaller than before */
        background: #f3f6fb;
        padding: 22px;
        border-radius: 10px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
    }

    .brochureform label {
        display: block;
        margin: 6px 0 4px;
        font-size: 14px;
        font-weight: 500;
    }

    .brochureform input,
    .brochureform textarea {
        width: 100%;
        padding: 8px 10px;
        border: 1px solid #ccc;
        border-radius: 6px;
        margin-bottom: 12px;
        font-size: 13px;
    }

    .brochureform textarea {
        resize: vertical;
        min-height: 80px;
    }

    .brochureform button {
        display: block;
        width: 100%;
        background: linear-gradient(to right, #e40001, #ff5557);
        border: none;
        padding: 10px;
        color: #fff;
        font-size: 14px;
        border-radius: 20px;
        cursor: pointer;
        font-weight: 600;
    }

    .brochureform button:hover {
        background: linear-gradient(to right, #c20001, #e13b3d);
    }

    /* Mobile responsive */
    @media (max-width: 768px) {
        .brochure-container {
            flex-direction: column;
        }
    }
</style>

@section('content')
<section class="brochure-section">
    <div class="brochure-container">

        <!-- Left Info -->
        <div class="brochure-info">
            <h2>Download Our Brochure</h2>
            <p><i class="fas fa-file-pdf"></i> Get a detailed brochure with all our products and services.</p>
            <p><i class="fas fa-check-circle"></i> Learn about features, specifications, and pricing.</p>
            <p><i class="fas fa-envelope-open-text"></i> Fill the form and receive your brochure instantly.</p>
        </div>

        <!-- Right Form -->
        <div class="brochure-form-wrapper">
            <form class="brochureform" action="{{ route('downloadBrochure') }}" method="POST">
                @csrf

                <label>Name *</label>
                <input type="text" name="name" placeholder="Enter your full name" required>

                <label>Phone *</label>
                <input type="text" name="phone" placeholder="Enter your phone number" maxlength="10" oninput="this.value=this.value.replace(/[^0-9]/g,'')" required>

                <label>Email *</label>
                <input type="email" name="email" placeholder="Enter your email" required>

                <label>Company</label>
                <input type="text" name="company_name" placeholder="Enter your company name">

                <label>Message</label>
                <textarea name="message" placeholder="Any specific requirements or message"></textarea>

                <button type="submit"><i class="fas fa-download"></i> Download Brochure</button>
            </form>
        </div>
    </div>
</section>
@endsection

@section('js')
@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success',
        text: "{{ session('success') }}",
        confirmButtonText: 'OK'
    });
</script>
@endif

@if(session('brochure_url'))
<script>
    window.addEventListener('DOMContentLoaded', function() {
        const brochureUrl = "{{ session('brochure_url') }}";
        if (brochureUrl) {
            const link = document.createElement('a');
            link.href = brochureUrl;
            link.download = 'brochure.pdf';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }
    });
</script>
@endif
@endsection
