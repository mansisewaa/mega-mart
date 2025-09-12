@extends('layouts.app')


@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">

            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white text-center py-3 rounded-top-4">
                    <h4 class="mb-0 text-white">Surgical Customer Signup</h4>
                </div>

                <div class="card-body p-4">
                    <form method="POST" action="{{ route('customer.register') }}">
                        @csrf

                        <div class="row g-3">
                            {{-- Name --}}
                            <div class="col-md-6">
                                <label for="name" class="form-label fw-semibold">First Name</label>
                                <input type="text" id="first_name" name="first_name" class="form-control rounded-3" placeholder="Enter your First name" required>
                            </div>
                            <div class="col-md-6">
                                <label for="name" class="form-label fw-semibold">Last Name</label>
                                <input type="text" id="last_name" name="last_name" class="form-control rounded-3" placeholder="Enter your Last name" required>
                            </div>

                            {{-- Contact --}}
                            <div class="col-md-6">
                                <label for="contact" class="form-label fw-semibold">Contact Number</label>
                                <input type="text" id="contact" name="contact" class="form-control rounded-3" placeholder="+91 89745 45127" required>
                            </div>

                            {{-- Email --}}
                            <div class="col-md-6">
                                <label for="email" class="form-label fw-semibold">Email Address</label>
                                <input type="email" id="email" name="email" class="form-control rounded-3" placeholder="example@surgicalstore.com" required>
                            </div>

                            {{-- Address --}}
                            <div class="col-md-6">
                                <label for="address" class="form-label fw-semibold">Address</label>
                                <input type="text" id="address" name="address" class="form-control rounded-3" placeholder="Enter your delivery address" required>
                            </div>
                            <div class="col-md-6">
                                <label for="address" class="form-label fw-semibold">City</label>
                                <input type="text" id="city" name="city" class="form-control rounded-3" placeholder="Enter your city" required>
                            </div>

                            {{-- State --}}
                            <div class="col-md-6">
                                <label for="state" class="form-label fw-semibold">State</label>
                                <input type="text" id="state" name="state" class="form-control rounded-3" placeholder="Enter your state" required>
                            </div>

                            {{-- Pin Code --}}
                            <div class="col-md-6">
                                <label for="pin_code" class="form-label fw-semibold">Pin Code</label>
                                <input type="text" id="pin_code" name="pin_code" class="form-control rounded-3" placeholder="Enter your pin code" required>
                            </div>
                             {{-- Password --}}
                            <div class="col-md-6">
                                <label for="password" class="form-label fw-semibold">Password</label>
                                <input type="password" id="password" name="password" class="form-control rounded-3" required>
                            </div>

                            {{-- Confirm Password --}}
                            <div class="col-md-6">
                                <label for="password_confirmation" class="form-label fw-semibold">Confirm Password</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control rounded-3" required>
                            </div>
                        </div>

                        {{-- Submit --}}
                        <div class="d-grid mt-3">
                            <button type="submit" class="btn btn-primary btn-lg rounded-3">
                                <i class="bi bi-box-arrow-in-right me-2"></i> Register & Continue
                            </button>
                        </div>

                        {{-- Go to Login --}}
                        <div class="text-center mt-2">
                            <p class="mb-0">
                                Already have an account?
                                <a href="{{ route('customer.login') }}" class="fw-semibold text-primary">Login</a>
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
