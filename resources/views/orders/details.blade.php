@extends('layouts.app')
<style>
    .orders-container {
        max-width: 900px;
        margin: auto;
        background: #fff;
        border-radius: 15px;
        padding: 30px 60px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .orders-container h2 {
        margin-bottom: 20px;
    }

    .back-to-order {
        padding: 5px 10px;
        border-radius: 8px;
        background: #3b8dff;
        color: #fff;
        text-decoration: none;
        margin-left: 20px;
    }


</style>
@section('content')
<div class="container" style="padding: 66px 60px;">
<div class="orders-container">
    <h2>Order Details</h2>

    <div class="order-card">
        <div class="order-header" style="display:flex; justify-content:space-between; align-items:center; padding:10px 0;">
            <div>
                <strong>Order #{{ $order->order_no }}</strong><br>
                <small>{{ $order->created_at->format('d M Y, h:i A') }}</small>
            </div>
            <div>
                <strong>Total:</strong> {{ formatRupees($order->total_price) }}
            </div>
            <div>
                <a href="{{ route('customer.orders.show') }}" class="back-to-order">
                    Back to Orders
                </a>
            </div>
        </div>
        <!-- Shipping Address -->
        <div class="address-box" style="margin: 15px 0; padding: 10px; background: #f7f9fc; border-radius: 8px;">
            <h4>Shipping Address</h4>
            <p>{{ $order->shipping_address }}</p>
        </div>

        <!-- Items -->
        <h4>Items</h4>
        <table style="width:100%; border-collapse:collapse;">
            <thead>
                <tr style="background:#f7f9fc;">
                    <th style="padding:10px; border:1px solid #ddd;">Product</th>
                    <th style="padding:10px; border:1px solid #ddd;">Price</th>
                    <th style="padding:10px; border:1px solid #ddd;">Quantity</th>
                    <th style="padding:10px; border:1px solid #ddd;">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->items as $item)
                <tr>
                    <td style="padding:10px; border:1px solid #ddd;">{{ $item->product->product_name }}</td>
                    <td style="padding:10px; border:1px solid #ddd;">{{ formatRupees($item->price) }}</td>
                    <td style="padding:10px; border:1px solid #ddd;">{{ $item->quantity }}</td>
                    <td style="padding:10px; border:1px solid #ddd;">{{ formatRupees($item->total_price) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>


    </div>
</div>
</div>
@endsection
