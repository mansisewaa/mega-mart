@extends('backend.layout.app')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Orders </h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="#">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Orders Details</a>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12">
                @include('backend.flash_message')
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Order #{{ $order->orderNo }}</h4>
                        <a href="{{route('order-invoice', $order->orderNo)}}" target="_blank" class="btn btn-primary btn-sm">
                            <i class="bi bi-receipt"></i> View Invoice
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <!-- Order Info -->
                            <div class="col-md-6">
                                <h5 class="fw-bold mb-3">Order Information</h5>
                                <p><strong>Date:</strong> {{ $order->created_at->format('d M Y, h:i A') }}</p>
                                <p><strong>Status:</strong>
                                    <span class="badge bg-info">{{ ucfirst($order->status) }}</span>
                                </p>
                                <p><strong>Total Amount:</strong> {{ formatRupees($order->total_price) }}</p>
                                <p><strong>Expected Delivery:</strong>
                                    {{ $order->expected_delivery_date ? date('d M Y', strtotime($order->expected_delivery_date)) : '-' }}
                                </p>
                            </div>

                            <!-- Customer Info -->
                            <div class="col-md-6">
                                <h5 class="fw-bold mb-3">Customer Details</h5>
                                <p><strong>Name:</strong> {{ $order->customer->name }}</p>
                                <p><strong>Email:</strong> {{ $order->customer->email }}</p>
                                <p><strong>Phone:</strong> {{ $order->customer->phone_no }}</p>
                                <p><strong>Shipping Address:</strong><br>{{ $order->shipping_address ?? '-' }}</p>
                            </div>
                        </div>

                        <!-- Items -->
                        <div class="table-responsive">
                            <h5 class="fw-bold mb-3">Ordered Items</h5>
                            <table class="table table-bordered text-center">
                                <thead class="table-light">
                                    <tr>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($order->items as $item)
                                    <tr>
                                        <td>{{ $item->product->product_name }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ formatRupees($item->price) }}</td>
                                        <td>{{ formatRupees($item->quantity * $item->price) }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3" class="text-end"><strong>Subtotal:</strong></td>
                                        <td>{{ formatRupees($order->total_price) }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
@endsection
