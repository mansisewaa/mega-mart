@extends('backend.layout.app')


<style>
    label {
        display: inline-block;
        line-height: 3rem !important;
    }

    .ui-sortable-helper {
        background-color: grey;
    }
</style>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Products & Services</h3>
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
                    <a href="#">Products & Services</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Add Products</a>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12">
                @include('backend.flash_message')
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"> Add Products</h3>
                    </div>
                    <div class="card-body">

                        <form action="{{route('store-products')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Category</label>
                                        <select name="category" id="" class="form-control" required>
                                            <option value="">Select Category</option>
                                            <option value="Hospital Beds">Hospital Beds</option>
                                            <option value="Delivery Beds">Delivery Beds</option>
                                            <option value="Trolleys">Trolleys</option>
                                            <option value="Others">Others</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Code</label>
                                        <input type="text" class="form-control" id="" name="code" required>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input type="text" class="form-control" id="" name="title" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Image</label>
                                        <input type="file" class="form-control" id="" name="file" required>
                                    </div>
                                </div>

                            </div>



                            <div class="form-group">
                                <label for="exampleInputEmail1">Description</label>
                                <textarea name="description" id="description" cols="30" rows="10"></textarea>
                            </div>


                            <button type="submit" class="btn btn-primary offset-6">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>


    </div>
</div>
@endsection
@section('js')

<script src={{asset("ckeditor/ckeditor.js")}}></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
    CKEDITOR.replace('description', {
        filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
        customConfig: "{{asset('ckeditor/config.js')}}",
        filebrowserUploadMethod: 'form',
        allowedContent: true,
        height: '300px',
        width: '100%',
        // removePlugins: 'sourcearea'
    })
</script>

@endsection
