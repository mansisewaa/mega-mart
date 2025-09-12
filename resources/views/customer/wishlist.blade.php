@extends('layouts.app')

<style>
    .wishlist-wrapper {
        margin: 90px auto;
        max-width: 1200px;
    }

    .wishlist-header {
        font-size: 22px;
        font-weight: bold;
        margin-bottom: 20px;
        padding: 10px 0;
        /* border-bottom: 2px solid #2874f0; */
        color: #333;
    }

    .wishlist-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        background: #fff;
        border: 1px solid #e2dddd;
        border-radius: 10px;
        padding: 15px 20px;
        margin-bottom: 15px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
    }

    .wishlist-item img {
        width: 100px;
        height: auto;
        border-radius: 8px;
        margin-right: 20px;
    }

    .wishlist-details {
        flex: 1;
    }

    .wishlist-details h5 {
        margin: 0;
        font-size: 16px;
        font-weight: 600;
        color: #333;
    }

    .wishlist-details p {
        margin: 5px 0 0;
        font-size: 15px;
        font-weight: bold;
        color: #2874f0;
    }

    .wishlist-actions {
        text-align: right;
    }

    .remove-btn {
        background: none;
        border: 1px solid grey;
        cursor: pointer;
        font-size: 18px;
        color: grey;
        padding: 8px 14px;
        border-radius: 4px;
        font-size: 18px;
        cursor: pointer;
         color: grey;
    }

    .btn-move {
        background: none;
        border: 1px solid grey;
        color: #fff;
        padding: 8px 14px;
        border-radius: 4px;
        font-size: 18px;
        cursor: pointer;
         color: grey;
    }

    .remove-btn:hover, .btn-move:hover {
        /* background: #0b5ed7; */
    }
</style>

@section('content')
<div class="container">
    <div class="wishlist-wrapper">

    <!-- Header -->
    <div class="wishlist-header">
        My Wishlist ({{ $wishlists->count() }})
    </div>

    <!-- Wishlist Items -->
    @forelse($wishlists as $item)
    <div class="wishlist-item">
        <!-- Product Image -->
        <a href="{{route('product.view',$item->product_id)}}"><img src="{{ asset('uploads/products/'.$item->product->product_image) }}" alt="{{ $item->product->product_name }}"></a>

        <!-- Product Details -->
        <div class="wishlist-details">
            <h5>{{ $item->product->product_name }}</h5>
            <p>
                <span style="font-weight: bold; color:#2874f0;">
                    {{ formatRupees($item->product->product_discount_price) }}
                </span>
                <span style="text-decoration: line-through; color: #999; margin-left: 8px;">
                    {{ formatRupees($item->product->product_original_price) }}
                </span>
            </p>
        </div>

        <!-- Actions -->
        <div class="wishlist-actions">
            <form action="{{route('customer.wishlist.remove',$item->product_id)}}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="remove-btn" onclick="return confirm('Are you sure you want to remove product from wishlist ?');">
                    <i class="fa fa-trash"></i>
                </button>
            </form>
        </div>
    </div>
    @empty
    <p style="text-align: center;color:red;">No items in your wishlist</p>
    @endforelse

</div>
</div>

@endsection
