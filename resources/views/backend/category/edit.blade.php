@extends('backend.layout.app')
<style>
    label {
        display: inline-block;
        line-height: 3rem !important;
    }

    .col-md-2 {
        flex: 0 0 auto;
        width: 18.666667% !important;
    }

    /* .image {
        width: 100%;
        height: 70%;
    } */
</style>
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Category</h3>
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
                    <a href="#">Category</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Edit</a>
                </li>
            </ul>
        </div>
        <!-- style="display: flex;justify-content:center;" -->

        <div class="row">
            @include('backend.flash_message')
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{route('category.update',$category->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" class="form-control" id="" placeholder="Enter Name" name="name" value="{{$category->name}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Image</label>
                                <input type="file" class="form-control" id="" placeholder="Enter email" name="file">

                                 @if($category->file)
                                    <a href="{{asset('uploads/categoryfiles/'. $category->file)}}" class="btn btn-primary btn-sm">View</a>
                                @endif
                            </div>
                        </div>


                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm" style="float: right ;">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
