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
            <h3 class="fw-bold mb-3">Notifications</h3>
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
                    <a href="#">Notifications</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Add</a>
                </li>
            </ul>
        </div>
        <div class="row" >
                    <div class="col-md-8">
                           @include('backend.flash_message')
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Add</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{route('notification.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Select Section</label> <br/>
                                            @foreach ($sections as $section)
                                                <div style="display: inline; padding-left:.2rem;">
                                                    <input type="checkbox" id="section" class="checkbox" name="section[]" value="{{$section->id}}" />
                                                    <label for="section">{{$section->name}}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Title</label>
                                            <input type="text" class="form-control" id="" placeholder="Enter title" name="title">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFile">Description</label>
                                            <textarea name="description" id="" class="form-control" rows="4 "></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">File</label>
                                            <input type="file" class="form-control" id="" name="file">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">New</label>
                                                <div style="display: inline; padding-left:.2rem;">
                                                    <input type="checkbox" id="section" class="checkbox" name="new" value="1" />
                                                </div>
                                        </div>
                                        <div class="form-group offset-5">
                                            <button type="submit" class="btn btn-primary ">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

    </div>
</div>

@endsection
