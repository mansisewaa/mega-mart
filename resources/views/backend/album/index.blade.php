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
            <h3 class="fw-bold mb-3">Gallery</h3>
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
                    <a href="#">Gallery</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Add Image</a>
                </li>
            </ul>
        </div>
        <!-- style="display: flex;justify-content:center;" -->

        <div class="row" >
        @include('backend.flash_message')
            <div class="col-md-6" >
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Add Image</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{route('gallery.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" class="form-control" id="" placeholder="Enter title" name="title">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Image</label>
                                <input type="file" class="form-control" id="" placeholder="Enter email" name="file">
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
                        <h4 class="card-title">Images</h4>
                    </div>
                    <div class="card-body">
                        <div>
                            <div class="filter-container p-0 row">
                                @foreach ($albums as $album)
                                <div class="filtr-item col-md-2  pt-3" data-category="1" data-sort="white sample">
                                    <a href="{{ asset('images/album/' . $album->cover_image) }}" data-toggle="lightbox" data-title="sample 1 - white">
                                        <img src="{{ asset('images/album/' . $album->cover_image) }}" class="img-fluid mb-2 image" alt="white sample" />
                                    </a>
                                    <p>{{$album->name}}</p>
                                    <div>
                                        <!-- <a href="{{route('gallery.sub-category',Crypt::encrypt($album->id))}}" style="margin-bottom: 2px;" class="btn btn-info btn-sm">
                                            <i class="fa fa-add"></i> Subalbums </a> -->
                                        <!-- <a href="{{route('gallery.add-image',['album',Crypt::encrypt($album->id)])}}" class="btn btn-primary btn-sm"> <i class="fa fa-add"></i> Images</a> -->
                                        <a href="{{route('gallery.album-delete',Crypt::encrypt($album->id))}}" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i></a>
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
