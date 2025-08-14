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
            <h3 class="fw-bold mb-3">Banner</h3>
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
                    <a href="#">Banner</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Add</a>
                </li>
            </ul>
        </div>
        <!-- style="display: flex;justify-content:center;" -->

        <div class="row">
            <div class="col-md-6">
                @include('backend.flash_message')
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Add Image</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{route('banner.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputFile">Banner Image <span style="color:#ff0000; font-size:12px;">(Recommended Size: 2637x983 pixels)</span></label>
                                <input type="file" class="form-control" name="file" style="border:1px solid #ff0000;">
                            </div>
                        </div>
                        <!-- /.card-body -->
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
                        <h4 class="card-title">Banners </h4>
                    </div>
                    <div class="card-body">
                        <div>
                            <div class="filter-container p-0 row">
                                @foreach ($banners as $data)
                                <div class="filtr-item col-md-2  pt-3" data-category="1" data-sort="white sample">
                                    <a href="{{ asset('uploads/banner/' . $data->file) }}" data-toggle="lightbox" data-title="sample 1 - white">
                                        <img src="{{ asset('uploads/banner/' . $data->file) }}" class="img-fluid mb-2 image" alt="white sample" style="height:150px;" />
                                    </a>
                                    <div style="float: right;">
                                        @if($data->status == 1)
                                        <a href="{{ route('banner.change.status', Crypt::encrypt($data->id)) }}" class="btn btn-danger btn-sm">Inactivate</a>
                                        @else
                                        <a href="{{ route('banner.change.status', Crypt::encrypt($data->id)) }}" class="btn btn-success btn-sm">Activate</a>
                                        @endif


                                        <a href="{{route('banner.delete',Crypt::encrypt($data->id))}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this ?')"> <i class="fa fa-trash"></i></a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection
