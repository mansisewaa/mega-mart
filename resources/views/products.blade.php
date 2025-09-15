@extends('layouts.app')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<style>
    .product-section {
        display: flex;

    }

    /* Sidebar */
    .sidebar {
        /* width: 250px; */
        padding: 25px;
        /* border-right: 1px solid #e5e5e5; */
        min-height: 100vh;
        background: #fafafa;
    }

    .sidebar h3 {
        font-size: 18px;
        margin-bottom: 15px;
        font-weight: bold;
    }

    .sidebar ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    ul li {
        font-size: 16px !important;
    }

    .sidebar li {
        padding: 5px;
        cursor: pointer;
        border-radius: 6px;
        transition: 0.2s;
    }

    .sidebar li:hover {
        background: #f2f2f2;
    }

    .sidebar li.active {
        background: #1F5FFF;
        color: #fff;
        font-weight: bold;
    }

    /* Product grid */
    .products {
        flex: 1;
        padding: 20px;
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
        gap: 15px;
        /* control spacing between rows & columns */
        align-items: start;
    }

    .product-card {
        border: 1px solid #ddd !important;
        border-radius: 6px !important;
        padding: 10px !important;
        cursor: pointer;
        transition: 0.2s;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-between;
        /* distribute content evenly */
        height: 300px !important;
        /* keep uniform height */
    }

    .product-card:hover {
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        transform: translateY(-3px);
    }

    .product-card img {
        width: 100%;
        height: 203px;
        object-fit: contain;
        border-radius: 4px;
        background: #f9f9f9;
    }

    .product-card h4 {
        font-size: 14px;
        margin: 8px 0 4px;
        text-align: center;
        line-height: 1.2em;
        max-height: 2.4em;
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-box-orient: vertical;
        color: #1F5FFF;
    }

    .product-card p {
        font-size: 13px;
        color: black;
        margin: 0;
        font-weight: 600;
    }

    .hidden {
        display: none !important;
    }

    .product-card a {
        all: unset;
        display: block;
        width: 100%;
        height: 100%;
        cursor: pointer;
        text-align: center;
    }

    .product-card a h4 {
        color: #1F5FFF;
        text-decoration: none;
    }

    .product-card a p {
        color: black;
        font-weight: 600;
    }

    /* No products message */
    #noProducts {
        grid-column: 1 / -1;
        text-align: center;
        padding: 60px 20px;
        font-size: 18px;
        color: #777;
    }


    .wishlist-btn {
    position: absolute;
    top: 8px;
    right: 8px;
    background: #fff;
    border: 1px solid #ddd;
    border-radius: 50%;
    width: 35px;
    height: 35px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.2s ease-in-out;
    z-index: 5;
}

.wishlist-btn i {
    color: #777;
    font-size: 16px;
}

.wishlist-btn.active i {
    color: #e63946; /* red heart when active */
}

.wishlist-btn:hover {
    background: #f5f5f5;
}
</style>

@section('content')

<div class="container">
    <div class="product-section">
        <!-- Sidebar -->
        <div class="sidebar">
            <h3>Categories</h3>
            <ul id="categoryList">
                <li class="active" onclick="filterProducts('all', this)">All</li>
                @foreach($categories as $category)
                <li onclick="filterProducts('{{ $category->id }}', this)">{{ $category->name }}</li>
                @endforeach
            </ul>
        </div>


        <div class="products" id="productList">
            @foreach($products as $product)
            <div class="product-card" data-category="{{ $product->category->id }}">
                <button class="wishlist-btn {{ in_array($product->id, $wishlistIds) ? 'active' : '' }}"
                    data-id="{{ $product->id }}">
                    <i class="fa fa-heart"></i>
                </button>
                <a href="{{ route('product.view', $product->id) }}">

                    <img src="{{ asset('uploads/products/'. $product->product_image) }}"
                        alt="{{ $product->product_name }}">
                    <h4>{{ $product->product_name }}</h4>
                    <p>{{ formatRupees($product->product_discount_price) }}</p>
                </a>
            </div>
            @endforeach

            <div id="noProducts" class="hidden">
                No products found in this category
            </div>
        </div>
    </div>
</div>


@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function filterProducts(category, el = null) {
        let cards = document.querySelectorAll('.product-card');
        let found = false;

        cards.forEach(card => {
            if (category === 'all' || card.dataset.category === category) {
                card.classList.remove('hidden');
                found = true;
            } else {
                card.classList.add('hidden');
            }
        });

        // Toggle "No products" message
        let noProducts = document.getElementById('noProducts');
        if (found) {
            noProducts.classList.add('hidden');
        } else {
            noProducts.classList.remove('hidden');
        }

        // Active state for sidebar
        if (el) {
            document.querySelectorAll('.sidebar li').forEach(li => li.classList.remove('active'));
            el.classList.add('active');
        }
    }

    document.addEventListener("DOMContentLoaded", function() {
        filterProducts('all');
    });

    document.addEventListener("DOMContentLoaded", function() {
        let selectedCategory = "{{ $id ?? 'all' }}";
        let activeLi = document.querySelector(`#categoryList li[onclick*="'${selectedCategory}'"]`);
        filterProducts(selectedCategory, activeLi);
    });
</script>

<script>


$('.wishlist-btn').on('click', function(e) {
    e.preventDefault();

    var button = $(this);
    var productId = button.data('id');

    @if(!Auth::guard('customer')->check())
        window.location.href = "{{ route('customer.login') }}";
        return;
    @endif

    $.ajax({
        url: "{{ url('customer/wishlist/add') }}/" + productId,
        type: 'POST',
        success: function(data) {
            if (data.status === 'added') {
                button.addClass('active');
            } else {
                button.removeClass('active');
            }
            updateHeaderCounts();
        },
        error: function(err) {
            console.error(err);
        }
    });
});

 function updateHeaderCounts() {
        $.ajax({
            url: "{{ route('customer.counts') }}",
            type: "GET",
            success: function(counts) {
                $('.cart-count').text(counts.cartCount);
                $('.wishlist-count').text(counts.wishlistCount);
            }
        });
    }

</script>
@endsection
