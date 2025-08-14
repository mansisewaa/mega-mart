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
                    <a href="#">View</a>
                </li>
            </ul>
        </div>
        <div class="row" style="display: flex; justify-content:center;">
            <div class="col-md-10">
                @include('backend.flash_message')
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content:space-between;">
                        <h4 class="card-title">Details</h4>
                        <div>
                            <a href="{{route('notification.index')}}" class="btn btn-primary btn-sm">Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Sections</th>
                                <th>
                                    @php
                                    $typeIds = explode(',', $notification->section);
                                    $types = DB::table('sections')->whereIn('id', $typeIds)->get();
                                    @endphp
                                    @foreach ($types as $type)
                                    {{$type->name}} @if ($types->count() > 1) , @endif
                                    @endforeach
                                </th>
                            </tr>
                            <tr>
                                <th>Title</th>
                                <th>{{$notification->title}}</th>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <th>{{$notification->descrption}}</th>
                            </tr>
                            <tr>
                                <th>File</th>
                                <th>
                                    <a href="{{ asset('uploads/notification/' . $notification->id . '/' . $notification->file) }}" class="btn btn-success btn-sm ">
                                        <i class="fa fa-file-download"></i>
                                    </a>
                                </th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
