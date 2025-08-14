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
                    <a href="#">Add {{$menu->name}} Submenu</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-6">
                @include('backend.flash_message')
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Add Submenu</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('menu.store.submenu')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" class="form-control" id="" name="name">
                                    <input type="hidden" name="menu_id" value="{{$menu->id}}">
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


        <div class="row" style="display: flex; justify-content:center;">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content:space-between;">
                        <h4 class="card-title">List</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SL No</th>
                                        <th>Submenu Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="sortable">
                                    @forelse ($submenus as $key => $record )
                                    <tr class="sortable-row" data-id="{{ $record->id }}">
                                        <td class="drag-handle sl_no">{{$key+1}}</td>
                                        <td class="drag-handle">{{$record->name}}</td>
                                        <td class="drag-handle">
                                            @if($record->status == 1 )
                                                <span class="badge badge-success">Enabled</span>
                                            @else
                                                <span class="badge badge-danger">Disabled</span>
                                            @endif
                                        </td>
                                        <td class="drag-handle">
                                            <div style="display: flex; ">
                                                <a href="{{route('menu.edit.submenu',$record->id)}}" class="btn btn-info btn-sm"> <i class="fas fa-edit"></i> </a>
                                                <a href="{{route('menu.delete.submenu',$record->id)}}" class="btn btn-danger btn-sm" style="margin-left:.3rem;" onclick="return"> <i class="fas fa-trash"></i> </a>
                                                <!-- <a href="{{route('menu.add.submenu', $record->slug)}}" class="btn btn-primary btn-sm" style="margin-left:.3rem;">Add Submenu</a> -->
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6"></td>
                                    </tr>
                                    @endforelse
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
