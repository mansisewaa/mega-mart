@extends('layouts.app')
<style>
    .orders-container {
        max-width: 900px;
        margin: auto;
        background: #fff;
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .orders-container h2 {
        margin-bottom: 20px;
    }

    .order-card {
        border: 1px solid #eee;
        border-radius: 12px;
        padding: 20px;
        margin-bottom: 25px;
    }

    .order-header {
        display: flex;
        justify-content: space-between;
        margin-bottom: 15px;
        font-size: 14px;
    }

    .order-header strong {
        font-size: 16px;
    }

    /* Timeline */
    .timeline {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
        position: relative;
    }

    /* Base line */
    .timeline::before {
        content: '';
        position: absolute;
        top: 28%;
        left: 0;
        right: 0;
        height: 3px;
        background: #ddd;
        z-index: 1;
    }

    /* Progress line */
    .timeline::after {
        content: '';
        position: absolute;
        top: 28%;
        left: 0;
        height: 3px;
        background: #1a57ff;
        z-index: 1;
        width: 0;
        /* Default: no progress */
        transition: width 0.4s ease;
    }

    .timeline-step {
        text-align: center;
        flex: 1;
        position: relative;
        z-index: 2;
    }

    .timeline-step span {
        display: inline-block;
        width: 28px;
        height: 28px;
        border-radius: 50%;
        background: #ddd;
        line-height: 28px;
        color: #fff;
        font-size: 13px;
        margin-bottom: 5px;
        position: relative;
        z-index: 3;
    }

    .timeline-step.active span {
        background: #1a57ff;
    }

    .timeline-step p {
        font-size: 12px;
        margin: 0;
    }

    .timeline::after {
    width: var(--progress-width, 0);
}
</style>
@section('content')
<div class="container" style="padding: 66px 60px;">
    <div class="orders-container">
        <h2>My Orders</h2>

        <!-- Example Order 1 -->
        @forelse($orders as $order)
        <div class="order-card">
            <div class="order-header">
                <div>
                    <strong>Order : #{{ $order->orderNo }}</strong><br>
                    <small>Order Date : {{ $order->created_at->format('d M Y, h:i A') }}</small><br />
                    <small>
                        Expected Delivery Date :
                        {{ $order->expected_delivery_date ? date('d M Y', strtotime($order->expected_delivery_date)) : ' - ' }}
                    </small>
                </div>
                <div>
                    <strong>Total:</strong> {{ formatRupees($order->total_price) }}
                </div>
            </div>

            @php
                $progressWidth = match($order->status) {
                'pending' => '20%',
                'processing' => '44%',
                'shipped' => '69%',
                'delivered' => '100%',
                'default' => '0%'
            };
            @endphp

            <div class="timeline" style="--progress-width: {{ $progressWidth }};">
                <div class="timeline-step {{ in_array($order->status, ['pending','processing','shipped','delivered']) ? 'active' : '' }}">
                    <span>1</span>
                    <p>Pending</p>
                </div>
                <div class="timeline-step {{ in_array($order->status, ['processing','shipped','delivered']) ? 'active' : '' }}">
                    <span>2</span>
                    <p>Processing</p>
                </div>
                <div class="timeline-step {{ in_array($order->status, ['shipped','delivered']) ? 'active' : '' }}">
                    <span>3</span>
                    <p>Shipped</p>
                </div>
                <div class="timeline-step {{ $order->status === 'delivered' ? 'active' : '' }}">
                    <span>4</span>
                    <p>Delivered</p>
                </div>
            </div>

            <!-- Order Details Button -->
            <div style="margin-top:15px; text-align:right;">
                <a href="{{ route('customer.orders.details', $order->id) }}"
                    class="btn btn-primary"
                    style="padding:6px 12px; border-radius:8px; background:#1a57ff; color:#fff; text-decoration:none;">
                    View Details
                </a>
            </div>
        </div>
        @empty
        <p>No orders found.</p>
        @endforelse


    </div>
</div>

@endsection
@section('js')
@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Order Placed',
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
