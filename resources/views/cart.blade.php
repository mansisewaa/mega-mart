@extends('layouts.app')
<style>
    .cart-container {
        /* max-width: 1200px; */
        display: flex;
        gap: 30px;
        background-color: #fff;
        margin: 87px 2px;
        border-radius: 15px;
        background: #fff;
        border: 1px solid #e2dddd;
        padding: 50px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    /* Left: Cart Table */
    .cart-table {
        flex: 2;
        border-collapse: collapse;
        width: 100%;
    }

    .cart-table thead {
        background: #f7f9fc;
    }

    .cart-table th,
    .cart-table td {
        padding: 12px;
        text-align: center;
        /* border-bottom: 1px solid #eee; */
    }

    .cart-table img {
        width: 100px;
        border-radius: 8px;
    }

    .quantity-control {
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid #ccc;
        border-radius: 25px;
        overflow: hidden;
        max-width: 120px;
        margin: auto;
    }

    .quantity-control button {
        border: none;
        background: none;
        padding: 8px 14px;
        cursor: pointer;
        font-size: 18px;
        color: #0d1440;
    }

    .quantity-control input {
        width: 40px;
        border: none;
        text-align: center;
        font-size: 16px;
        outline: none;
    }

    .remove-btn {
        background: none;
        border: none;
        cursor: pointer;
        font-size: 20px;
        color: #1a57ff;
    }

    /* Right: Cart Summary */
    .cart-summary {
        flex: 1;
        background: #f7f9fc;
        padding: 20px;
        border-radius: 12px;
        height: fit-content;
    }

    .cart-summary h3 {
        margin-bottom: 20px;
        font-size: 22px;
    }

    .summary-item {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
        font-size: 16px;
    }

    .summary-item strong {
        font-weight: bold;
    }

    .checkout-btn {
        display: block;
        width: 100%;
        padding: 8px;
        background: linear-gradient(to right, #1a57ff, #3b8dff);
        color: #fff;
        border: none;
        border-radius: 12px;
        font-size: 16px;
        cursor: pointer;
        margin-top: 20px;
        text-align: center;
        text-decoration: none;
    }

    .checkout-btn:hover {
        opacity: 0.9;
        color: whitesmoke;
        font-size: 18px;
    }
</style>
@section('content')
<div class="container" style="padding: 66px 60px;">

    <div class="cart-container">

        <table class="cart-table">
            <thead>
                <tr>
                    <th>IMAGE</th>
                    <th>PRODUCT NAME</th>
                    <th>PRICE</th>
                    <th>QUANTITY</th>
                    <th>TOTAL</th>
                    <th>REMOVE</th>
                </tr>
            </thead>
            <tbody>
                @forelse($cartItems as $item)
                <tr>
                    <td>
                        @if($item->product->product_image)
                        <img src="{{ asset('uploads/products/' . $item->product->product_image) }}" alt="{{ $item->product->product_name }}">
                        @else
                        <img src="{{ asset('images/default.jpg') }}" alt="{{ $item->product->product_name }}">
                        @endif
                    </td>
                    <td><strong>{{$item->product->product_name}}</strong></td>
                    <td>{{formatRupees($item->price)}}</td>
                    <td>
                        <!-- <div class="quantity-control">
                            <button type="button" class="decrease-btn">-</button>
                            <input type="text" class="quantity-input" value="{{ $item->quantity }}" readonly>
                            <button type="button" class="increase-btn">+</button>
                        </div> -->
                        {{$item->quantity}}
                    </td>
                    <td>{{ formatRupees($item->total_price) }}</td>
                    <td>
                        <button type="button" class="remove-btn" data-id="{{ $item->id }}">
                            <i class="fa fa-trash" style="color: red;"></i>
                        </button>
                    </td>
                </tr>

                @empty
                <tr>
                    <td colspan="6">No items in the cart</td>
                </tr>
                @endforelse

            </tbody>
        </table>

        <div class="cart-summary">
            <h3>Cart Total</h3>
            <div class="summary-item">
                <span>Subtotal:</span>
                <span>{{ formatRupees($subtotal) }}</span>
            </div>
            <div class="summary-item">
                <strong>Final Total:</strong>
                <strong>{{formatRupees($subtotal) }}</strong>
            </div>
            <a href="{{route('customer.checkout')}}" class="checkout-btn">PROCEED TO CHECKOUT</a>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll(".quantity-control").forEach(function(control) {
            let input = control.querySelector(".quantity-input");
            let increaseBtn = control.querySelector(".increase-btn");
            let decreaseBtn = control.querySelector(".decrease-btn");

            increaseBtn.addEventListener("click", function() {
                let currentVal = parseInt(input.value);
                input.value = currentVal + 1;
            });

            decreaseBtn.addEventListener("click", function() {
                let currentVal = parseInt(input.value);
                if (currentVal > 1) { // prevent going below 1
                    input.value = currentVal - 1;
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        // Handle remove button click
        $('.remove-btn').click(function() {
            let itemId = $(this).data('id');
            let row = $(this).closest('tr');

            $.ajax({
                url: "{{ route('customer.remove-cart', '') }}/" + itemId,
                type: "GET",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.success) {
                        row.remove(); // Remove row from table

                        // Update totals
                        $(".cart-summary .summary-item span:last-child").text(response.formattedSubtotal);
                        $(".cart-summary .summary-item strong:last-child").text(response.formattedSubtotal);

                        // If cart is empty
                        if ($(".cart-table tbody tr").length === 0) {
                            $(".cart-table tbody").html('<tr><td colspan="6">No items in the cart</td></tr>');
                        }
                    } else {
                        alert("Something went wrong!");
                    }
                },
                error: function() {
                    alert("Failed to remove item. Please try again.");
                }
            });
        });
    });
</script>
@endsection
