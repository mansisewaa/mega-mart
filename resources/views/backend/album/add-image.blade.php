@extends('backend.layout.app')
<style>
    label {
        display: inline-block;
        line-height: 3rem !important;
    }
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
                    <a href="#">Add Album</a>
                </li>
            </ul>
        </div>
        <!-- style="display: flex;justify-content:center;" -->

        <div class="row">
        @include('backend.flash_message')
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Add Files - {{$album->name}}</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{route('gallery.store.image',Crypt::encrypt($album->id))}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" class="form-control" id="" placeholder="Enter title" name="title">
                                <input type="hidden" class="form-control" id="" name="type" value="{{$type}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Upload File</label>
                                <input type="file" class="form-control" id="" name="file">
                                <small class="text-muted">Upload an image.</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Upload Link</label>
                                <input type="text" class="form-control" id="" name="link">

                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm">Upload</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="display: flex; justify-content:space-between;">
                            <h4 class="card-title">Files </h4>
                            <a href="{{route('gallery.index')}}" class="btn btn-primary btn-sm">Back</a>
                        </div>
                        <div class="card-body">
                            <div>
                                <div class="filter-container p-0 row">
                                    @foreach ($images as $image)
                                    <div class="filtr-item col-sm-2 pt-2" data-category="1" data-sort="white sample">

                                        <!-- <a href="{{ asset('images/album/' . $image->image) }}" data-toggle="lightbox" data-title="sample 1 - white">
                                                    <img src="{{ asset('images/album/' . $image->image) }}" class="img-fluid mb-2" alt="white sample" />
                                                </a> -->
                                        @php
                                        $fileExtension = pathinfo($image->image, PATHINFO_EXTENSION);
                                        $filePath = asset('images/album/' . $image->image);
                                        @endphp

                                        @if(in_array($fileExtension, ['jpeg', 'jpg', 'png']))
                                        <a href="{{ $filePath }}" data-toggle="lightbox" data-title="sample 1 - white">
                                            <img src="{{ $filePath }}" class="img-fluid mb-2" alt="white sample" target="_blank" />
                                        </a>
                                        @elseif($fileExtension === 'mp4')
                                        <a href="{{ $filePath }}" data-toggle="lightbox" data-title="sample 1 - white">
                                            <video width="320" height="240" controls class="img-fluid mb-2">
                                                <source src="{{ $filePath }}" type="video/mp4">
                                            </video>
                                        </a>
                                        @else
                                        <!-- Handle other file types or show a default message -->
                                        <p>Unsupported file type</p>
                                        @endif

                                        <p>{{$image->name}}</p>
                                        <div>
                                            <a href="{{route('gallery.image-delete',Crypt::encrypt($image->id))}}" class="btn btn-danger btn-sm">Delete</a>
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
</div>
@endsection

