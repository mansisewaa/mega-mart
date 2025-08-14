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
            <h3 class="fw-bold mb-3">Menu</h3>
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
                    <a href="#">Menu</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Edit</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-8">
                @include('backend.flash_message')
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Add</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('menu.update',$menu->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" class="form-control" id="" name="name" value="{{$menu->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Sublink</label>
                                    <input type="checkbox"  id="" name="sublink" value="1" @if($menu->sublink == 1) checked @endif">
                                </div>

                                <div class="form-group offset-5">
                                    <button type="submit" class="btn btn-primary ">Update</button>
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
