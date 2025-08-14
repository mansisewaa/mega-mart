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
                    <a href="#">Edit </a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-6">
                @include('backend.flash_message')
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Submenu</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('menu.update.submenu')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" class="form-control" id="" name="name" value="{{$submenu->name}}">
                                    <input type="hidden" name="menu_id" value="{{$menu->id}}">
                                    <input type="hidden" name="id" value="{{$submenu->id}}">
                                </div>

                                <div class="form-group">
                                    <label>Status</label><br />
                                    <div class="d-flex">
                                        <div class="form-check">
                                            <input class="" type="radio" name="status" value="1" style="margin-right:.2rem;" />
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Enable
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="" type="radio" name="status" id="flexRadioDefault2" value="0" style="margin-right:.2rem;" />
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Disable
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary" style="float: right;">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
