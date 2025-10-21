@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">

            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white text-center py-3 rounded-top-4">
                    <h4 class="mb-0 text-white">Email OTP Verification</h4>
                </div>

                <div class="card-body p-4">
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form method="POST" action="{{ route('customer.otp.verify.submit') }}">
                        @csrf
                        <input type="hidden" name="email" value="{{ $email }}">

                        <div class="mb-3">
                            <label for="otp" class="form-label">Enter OTP</label>
                            <input type="text" name="otp" id="otp" class="form-control" placeholder="6-digit OTP" required>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">Verify OTP</button>
                        </div>
                    </form>
                </div>

                <div class="card-footer text-center py-3">
                    <small class="text-muted">Didn't receive OTP? Please check your email.</small>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
