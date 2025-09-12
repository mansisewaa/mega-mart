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

    img {
        max-width: 80%;
        height: 80%;
    }

    .modal-content table th,
    .modal-content table td {
        padding: 7px 20px !important;
        vertical-align: middle !important;
    }
</style>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">{{$data->name}}</h3>
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
                    <a href="#">{{$data->name}}</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Products</a>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12">
                @include('backend.flash_message')
                <div class="card">

                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h3 class="card-title">Products</h3>
                            <div>
                                <select id="categoryFilter" class="form-select form-select-sm" style="width:auto; display:inline-block;">
                                    <option value="all">All Categories</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <a href="{{route('add-products')}}" class="btn btn-primary btn-sm">
                                    <i class="fa fa-plus"></i> Add Product
                                </a>
                            </div>
                        </div>

                        <table class="table table-bordered table-hover text-center">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                    <th>Discount</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="productTable">
                                @forelse($products as $product)
                                <tr data-category="{{ $product->category_id }}">
                                    <td style="width:100px;">
                                        <img src="{{ asset('uploads/products/' . $product->product_image) }}"
                                            alt="Product Image"
                                            style="max-height:70px; object-fit:contain; width:auto;"
                                            data-bs-toggle="modal"
                                            data-bs-target="#productModal{{ $product->id }}">
                                    </td>
                                    <td>{{ $product->product_code }}</td>
                                    <td>{{ $product->product_name }}</td>
                                    <td>{{ $product->category->name ?? 'N/A' }}</td>
                                    <td>{{ $product->product_quantity ?? 0 }}</td>
                                    <td>₹{{ $product->product_original_price }}</td>
                                    <td>
                                        @if($product->product_discount_price)
                                        <span class="text-success fw-bold">₹{{ $product->product_discount_price }}</span>
                                        <!-- <del class="text-muted">₹{{ $product->product_original_price }}</del> -->
                                        @else
                                        -
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('edit-products', $product->id)}}" class="btn btn-success btn-sm"><i class="fa fa-pen"></i></a>
                                        <a href="{{route('delete-products', $product->id)}}" class="btn btn-danger btn-sm ms-1" onclick="return confirm('Are you sure ?');"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center">No Products Added</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
    @forelse($products as $product)
    <div class="modal fade" id="productModal{{ $product->id }}" tabindex="-1" aria-labelledby="productModalLabel{{ $product->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productModalLabel{{ $product->id }}">
                        {{ $product->product_name }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        {{-- Product Image --}}
                        <div class="col-md-4 text-center mb-3">
                            <img src="{{ asset('uploads/products/' . $product->product_image) }}"
                                alt="{{ $product->product_name }}"
                                class="img-fluid">
                        </div>

                        <div class="col-md-8">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Category</th>
                                    <td>{{ $product->category->name ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Code</th>
                                    <td>{{ $product->product_code ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Quantity</th>
                                    <td>{{ $product->product_quantity ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Original Price</th>
                                    <td>{{ $product->product_original_price ? '₹'.$product->product_original_price : 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Discount Price</th>
                                    <td>
                                        @if($product->product_discount_price)
                                        <span class="text-success fw-bold">₹{{ $product->product_discount_price }}</span>
                                        <del class="text-muted">₹{{ $product->product_original_price }}</del>
                                        @else
                                        N/A
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td>{!! $product->product_description !!}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    @empty
    @endforelse
</div>
@endsection

@section('js')
<script>
    document.getElementById('categoryFilter').addEventListener('change', function() {
        let selected = this.value;
        let rows = document.querySelectorAll('#productTable tr');
        rows.forEach(row => {
            if (selected === 'all' || row.dataset.category === selected) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>
@endsection
