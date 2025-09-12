@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-4">

            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white text-center py-3 rounded-top-4">
                    <h4 class="mb-0 text-white">Customer Login</h4>
                    <p class="mb-0 small  text-white">Please login to continue shopping</p>
                </div>

                <div class="card-body p-4">
                    <form method="POST" action="{{ route('customer.login') }}">
                        @csrf

                        {{-- Name --}}
                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold">Mobile Number/ Email Address</label>
                            <input type="text" id="name" name="email" class="form-control rounded-3" placeholder="Enter your full name" required>
                        </div>

                        {{-- Password --}}
                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold">Password</label>
                            <input type="password" id="password" name="password" class="form-control rounded-3" required>
                        </div>


                        {{-- Submit --}}
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg rounded-3">
                                <i class="bi bi-box-arrow-in-right me-2"></i> Login & Continue
                            </button>
                        </div>

                        {{-- Go to Register --}}
                        <div class="text-center">
                            <p class="mb-0 mt-2">
                                Don't have an account?
                                <a href="{{ route('customer.register') }}" class="fw-semibold text-primary">
                                    Register here
                                </a>
                            </p>
                        </div>
                    </form>
                </div>

                <div class="card-footer text-center py-3">
                    <small class="text-muted">By logging in, you agree to our <a href="#">Terms</a> & <a href="#">Privacy Policy</a>.</small>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
