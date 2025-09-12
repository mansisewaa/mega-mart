@extends('backend.layout.app')
<style>
    label {
        display: inline-block;
        line-height: 3rem !important;
    }

    .ui-sortable-helper {
        background-color: grey;
    }

    h5 {
        font-size: 1.5rem;
    }

    /* 🔹 Table styling */
    .table thead th {
        padding: 8px 6px !important;
        font-size: 15px;
        font-weight: 600;
        /* background: #f8f9fa; */
        text-align: center;
        vertical-align: middle !important;
    }

    .table tbody td {
        padding: 8px 6px !important;
        font-size: 14px;
        vertical-align: middle !important;
        text-align: center;
    }

    /* .table>tbody>tr>td, .table>tbody>tr>th {
        padding: 0px 13px !important;
    } */

    .table tbody tr:hover {
        background: #f5f5f5;
    }
</style>

<link rel="stylesheet"
    href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Orders</h3>
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
                    <a href="#">Orders</a>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12">
                @include('backend.flash_message')
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h3 class="card-title">Orders</h3>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered align-middle">
                                <thead>
                                    <tr>
                                        <th>SL No</th>
                                        <th>Order No</th>
                                        <th>Customer</th>
                                        <th>Total</th>
                                        <th>Payment Method</th>
                                        <th>Status</th>
                                        <th>Delivery Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($orders as $index => $order)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $order->orderNo }}</td>
                                        <td>{{ $order->customer->name }}</td>
                                        <td>₹{{ number_format($order->total_price, 2) }}</td>
                                        <td>{{ ucfirst($order->payment_method) }}</td>
                                        <td>
                                            @switch($order->status)
                                            @case('pending')
                                            <span class="badge bg-primary">Pending</span>
                                            @break

                                            @case('processing')
                                            <span class="badge bg-warning text-white">Processing</span>
                                            @break

                                            @case('shipped')
                                            <span class="badge bg-info text-white">Shipped</span>
                                            @break

                                            @case('delivered')
                                            <span class="badge bg-success">Delivered</span>
                                            @break

                                            @default
                                            <span class="badge bg-secondary">Unknown</span>
                                            @endswitch
                                        </td>
                                         <td>{{ date('d-m-Y', strtotime($order->expected_delivery_date)) ?? ''}}</td>
                                        <td>
                                            <a href=""
                                                class="btn btn-sm btn-primary">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="javascript:void(0)"
                                                class="btn btn-sm btn-success"
                                                data-bs-toggle="modal"
                                                data-bs-target="#updateOrderModal-{{ $order->id }}">
                                                <i class="fa fa-pen"></i>
                                            </a>

                                        </td>
                                    </tr>

                                    <!-- Modal -->
                                    <div class="modal fade" id="updateOrderModal-{{ $order->id }}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Update Order Status</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>

                                                <!-- Modal Body -->
                                                <div class="modal-body">
                                                    <form action="{{ route('update-order-status', $order->id) }}" method="POST">
                                                        @csrf

                                                        <!-- Delivery Status -->
                                                        <div class="mb-3">
                                                            <label for="status-{{ $order->id }}" class="form-label">Delivery Status</label>
                                                            <select name="status" id="status-{{ $order->id }}" class="form-control" required>
                                                                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                                <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                                                                <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                                                                <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                                                            </select>
                                                        </div>

                                                        <!-- Delivery Date -->
                                                        <div class="mb-3">
                                                            <label for="delivery_date-{{ $order->id }}" class="form-label">Delivery Date</label>
                                                            <input type="date" name="delivery_date" id="delivery_date-{{ $order->id }}"
                                                                value="{{ $order->delivery_date ?? '' }}"
                                                                class="form-control"    >
                                                        </div>

                                                        <!-- Submit -->
                                                        <div class="text-end">
                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                        </div>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted">No Orders Yet</td>
                                    </tr>
                                    @endforelse
                                </tbody>
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
