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
                    <a href="#">Add New</a>
                </li>
            </ul>
        </div>
        <!-- style="display: flex;justify-content:center;" -->

        <div class="row">
            @include('backend.flash_message')
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Add</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" class="form-control" id="" placeholder="Enter Name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Image</label>
                                <input type="file" class="form-control" id="" placeholder="Enter email" name="file">
                            </div>
                        </div>


                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm" style="float: right ;">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">List</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Name</th>
                                        <th>Code</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse($categories as $key => $category)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->code}}</td>
                                        <td>
                                            @if($category->file)
                                            <a href="{{asset('uploads/categoryfiles/'. $category->file)}}" target="_blank ">View Image</a>
                                            <!-- <img src="{{asset('uploads/categoryfiles/'. $category->file)}}" alt="" style="width:10rem;"> -->
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('category.edit',$category->id)}}" class="btn btn-sm btn-primary">Edit</a>
                                            <a href="{{route('category.delete',$category->id)}}" class="btn btn-sm btn-danger" onclick= "return confirm('Are you sure ?');">Delete</a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="text-center">No Data Found</td>
                                    </tr>
                                    @endforelse()
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
