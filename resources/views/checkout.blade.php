@extends('layouts.app')

<style>
    .checkout-container {
        max-width: 800px;
        margin: 100px auto;
        background: #fff;
        border-radius: 15px;
        border: 1px solid #e2dddd;
        padding: 30px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .checkout-container h2 {
        margin-bottom: 20px;
        font-size: 24px;
    }

    .checkout-section {
        margin-bottom: 25px;
    }

    .checkout-section h4 {
        margin-bottom: 10px;
        font-size: 18px;
    }

    .summary-item {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
    }

    .checkout-btn {
        display: block;
        width: 100%;
        padding: 6px;
        background: linear-gradient(to right, #1a57ff, #3b8dff);
        color: #fff;
        border: none;
        border-radius: 12px;
        font-size: 16px;
        cursor: pointer;
        text-align: center;
        text-decoration: none;
        margin-top: 2rem;
    }

    .checkout-btn:hover {
        opacity: 0.9;
        font-size: 17px;
    }

    .address-box {
        padding: 15px;
        background: #f7f9fc;
        border-radius: 10px;
        border: 1px solid #ddd;
    }
</style>

@section('content')
<div class="checkout-container">
    <h2>Checkout</h2>

    <!-- Order Summary -->
    <div class="checkout-section">
        <h4>Order Summary</h4>
        <div class="summary-item">
            <span>Order No:</span>
            <strong>{{$orderNo }}</strong>
        </div>
        <div class="summary-item">
            <span>Total Price:</span>
            <strong>{{ formatRupees($subtotal) }}</strong>
        </div>
    </div>

    <!-- Shipping Address -->
    <div class="checkout-section">
        <h4>Shipping Address</h4>
        <div class="address-box">
            <p><strong> Name : {{ auth()->guard('customer')->user()->name }}</strong></p>
            <p>{{ auth()->guard('customer')->user()->address }}</p>
            <p>{{ auth()->guard('customer')->user()->city }}, {{ auth()->guard('customer')->user()->state }} - {{ auth()->guard('customer')->user()->pin_code }}</p>
            <p>Phone: {{ auth()->guard('customer')->user()->phone_no }}</p>
        </div>
    </div>

    <!-- Payment Method -->
    <div class="checkout-section">
    <h4>Payment Method</h4>
    <form action="{{route('customer.checkout.place')}}" method="POST">
        @csrf

        <div>
            <label>
                <input type="radio" name="payment_method" value="cod" checked>
                Cash on Delivery (COD)
            </label>
        </div>

        <div>
            <label>
                <input type="radio" name="payment_method" value="upi">
                UPI (Google Pay, PhonePe, Paytm, etc.)
            </label>
        </div>

        <div>
            <label>
                <input type="radio" name="payment_method" value="card">
                Credit / Debit Card
            </label>
        </div>

        <input type="hidden" name="subtotal" value="{{ $subtotal }}">
        <input type="hidden" name="orderNo" value="{{$orderNo}}">

        <button type="submit" class="checkout-btn">Place Order</button>
    </form>
</div>

</div>
@endsection
