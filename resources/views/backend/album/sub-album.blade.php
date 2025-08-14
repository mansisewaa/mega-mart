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
                    <a href="#">Add Sub Albums</a>
                </li>
            </ul>
        </div>
        <!-- style="display: flex;justify-content:center;" -->

        <div class="row" >
        @include('backend.flash_message')
            <div class="col-md-6" >
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Add Sub Album - {{$album->name}}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('gallery.store.sub-album',Crypt::encrypt($album->id))}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <input type="text" class="form-control" id="" placeholder="Enter title" name="title">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Cover Image</label>
                            <input type="file" class="form-control" id="" placeholder="Enter email" name="file">
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            <div class="card ">
                            <div class="card-header">
                                <h4 class="card-title">Sub Albums</h4>
                            </div>
                            <div class="card-body">
                                <div>
                                    <div class="filter-container p-0 row">
                                        @foreach ($sub_albums as $sub_album)
                                        <div class="filtr-item col-sm-2" data-category="1" data-sort="white sample">
                                            <a href="{{ asset('images/album/subalbum/' . $sub_album->cover_image) }}" data-toggle="lightbox" data-title="sample 1 - white">
                                                <img src="{{ asset('images/album/subalbum/' . $sub_album->cover_image) }}" class="img-fluid mb-2" alt="white sample" />
                                            </a>
                                            <p>{{$sub_album->name}}</p>
                                            <div>
                                                <a href="{{route('gallery.add-image',['sub_album',Crypt::encrypt($sub_album->id)])}}" class="btn btn-primary btn-sm">Add Images</a>
                                                <a href="{{route('gallery.sub-album-delete',Crypt::encrypt($sub_album->id))}}" class="btn btn-danger btn-sm">Delete</a>
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

