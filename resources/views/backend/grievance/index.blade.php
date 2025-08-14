@extends('backend.layout.app')


<style>
    label {
        display: inline-block;
        line-height: 3rem !important;
    }

    .ui-sortable-helper {
        background-color: grey;
        /* Change the background color to light grey */
    }
</style>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Grievances</h3>
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
                    <a href="#">Grievances</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <!-- <li class="nav-item">
                    <a href="#">View</a>
                </li> -->
            </ul>
        </div>
        <div class="row" style="display: flex; justify-content:center;">
            <div class="col-md-12">
                @include('backend.flash_message')
                <div class="card ">

                    <div class="card-header" style="display: flex; justify-content:space-between;">
                        <h4 class="card-title">List</h4>
                        <div>
                            <!-- <a href="{{route('notification.create')}}" class="btn btn-primary btn-sm">Add New</a> -->
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SL No</th>
                                        <th>Created</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Message</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="sortable">
                                    @forelse ($records as $key => $record )
                                    <tr class="sortable-row" data-id="{{ $record->id }}">
                                        <td >{{$key+1}}</td>
                                        <td style="width: 9%;">{{date('d-m-Y',strtotime($record->created_at))}}</td>
                                        <td  style="width: 9%;">{{$record->name}}</td>
                                        <td >{{$record->email}}</td>
                                        <td >{{$record->message}}</td>
                                        <td >@if($record->status == 'pending') <span class="badge badge-danger">{{$record->status}}</span> @endif</td>
                                        <td >
                                            <div class="d-flex">
                                                <a href="" class="btn btn-warning btn-sm" style="margin-right: .3rem;"> <i class="fa fa-pen"></i></a>
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
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<script>
    $(document).ready(function() {
        setTimeout(function() {
            $('.alert').fadeOut();
        }, 1000);
    });
</script>
