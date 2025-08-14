@extends('layouts.app')
<!-- SweetAlert CSS and JavaScript -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.min.css">

@section('content')
<section class="donate-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-12 mx-auto">
                <form class="custom-form donate-form" action="{{route('downloadBrochure')}}" method="post" role="form">
                    @csrf

                    <h4 class="mb-4" style="text-align: center;">Download Brochure</h4>

                    <div class="row">
                        <div class="col-lg-6 col-12 my-2">
                            <label for="name" class="form-label">Name*</label>
                            <input type="text" name="name" id="name"
                                placeholder="Enter your full name"
                                class="form-control form-control-sm @error('name') is-invalid @enderror" required>
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-6 col-12 my-2">
                            <label for="phone" class="form-label">Phone*</label>
                            <input type="text" name="phone" id="phone"
                                placeholder="e.g., 1234567890"
                                class="form-control form-control-sm @error('phone') is-invalid @enderror"
                                oninput="this.value = this.value.replace(/[^0-9]/g, '')" maxlength="10" required>
                            @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-6 col-12 my-2">
                            <label for="email" class="form-label">Email*</label>
                            <input type="email" name="email" id="email"
                                placeholder="name@example.com"
                                class="form-control form-control-sm @error('email') is-invalid @enderror" required>
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-6 col-12 my-2">
                            <label for="company_name" class="form-label">Company Name <small>(Optional)</small></label>
                            <input type="text" name="company_name" id="company_name"
                                placeholder="Your company name"
                                class="form-control form-control-sm @error('company_name') is-invalid @enderror">
                            @error('company_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-12 col-12 my-2">
                            <label for="message" class="form-label">Message</label>
                            <textarea name="message" id="message"
                                placeholder="Any specific requirements or message"
                                cols="30" rows="5"
                                class="form-control form-control-sm @error('message') is-invalid @enderror"></textarea>
                            @error('message')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-12 col-12 my-2">
                            <button type="submit" class="form-control btn btn-sm" style="background-color:#e40001;">
                                <i class="fas fa-download"></i> Download Brochure
                            </button>
                        </div>
                    </div>

                </form>
            </div>

        </div>
    </div>
</section>
@endsection

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.min.js"></script>
@if(session('success'))
<script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                title: 'Success!',
                text: "{{ session('success') }}",
                icon: 'success',
                confirmButtonText: 'OK'
            });
        });
    </script>
@endif


@if(session('brochure_url'))
<script>

    window.addEventListener('DOMContentLoaded', function() {
        const brochureUrl = "{{ session('brochure_url') }}";
        if (brochureUrl) {
            // Create a temporary link element and trigger click to download
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
