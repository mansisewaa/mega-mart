@extends('layouts.app')

@section('css')
<style>
.orders-container {
    max-width: 900px;
    margin: auto;
    background: #fff;
    border-radius: 15px;
    padding: clamp(20px, 5vw, 30px);
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.orders-container h2 {
    margin-bottom: 20px;
    text-align: center;
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

.timeline::after {
    content: '';
    position: absolute;
    top: 28%;
    left: 0;
    height: 3px;
    background: #1a57ff;
    z-index: 1;
    width: var(--progress-width, 0);
    transition: width 0.4s ease, height 0.4s ease;
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

.order-buttons {
    margin-top: 15px;
    text-align: right;
}

/* Responsive Mobile */
@media (max-width: 468px) {
    .order-header {
        flex-direction: column;
        text-align: center;
    }
    .order-header > div {
        margin-bottom: 10px;
    }

    .timeline {
        flex-direction: column;
        align-items: flex-start;
        position: relative;
        padding-left: 20px;
        margin-top: 25px;
    }
    .timeline::before {
        top: 0;
        left: 12px;
        width: 3px;
        height: 100%;
    }
    .timeline::after {
        top: 0;
        left: 12px;
        width: 3px;
        height: var(--progress-height, 0);
    }
    .timeline-step {
        margin-bottom: 25px;
        text-align: left;
        position: relative;
    }
    .timeline-step span {
        position: absolute;
        left: -1px;
        top: 0;
    }
    .timeline-step p {
        margin-left: 35px;
        font-size: 13px;
    }
    .order-buttons {
        text-align: center;
    }
    .orders-container p {
        text-align: center;
    }
}
</style>
@endsection


@section('content')
<div class="container" style="padding: clamp(20px, 5vw, 66px) clamp(10px, 5vw, 60px);">
    <div class="orders-container">
        <h2>My Orders</h2>

        @forelse($orders as $order)
        <div class="order-card">
            <!-- Order Header -->
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
                    default => '0%',
                };
                $progressHeight = match($order->status) {
                    'pending' => '25%',
                    'processing' => '50%',
                    'shipped' => '75%',
                    'delivered' => '100%',
                    default => '0%',
                };
            @endphp

            <!-- Timeline -->
            <div class="timeline" style="--progress-width: {{ $progressWidth }}; --progress-height: {{ $progressHeight }};">
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

            <!-- Buttons -->
            <div class="order-buttons">
                <a href="{{ route('customer.orders.details', $order->id) }}" class="btn btn-sm btn-outline-primary mt-2">
                    <i class="bi bi-eye"></i> Details
                </a>
                <a href="{{ route('customer.invoice.download', $order->orderNo)}}" class="btn btn-sm btn-outline-primary mt-2">
                    <i class="bi bi-receipt"></i> Invoice
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
