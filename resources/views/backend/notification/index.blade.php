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
                                    <a href="{{route('notification.create')}}" class="btn btn-primary btn-sm">Add New</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>SL No</th>
                                                <th>Created</th>
                                                <th>Section</th>
                                                <th>Title</th>
                                                <th>File</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="sortable">
                                            @forelse ($notifications as $key => $record )
                                            <tr class="sortable-row" data-id="{{ $record->id }}">
                                                <td class="drag-handle sl_no">{{$key+1}}</td>
                                                <td class="drag-handle">{{date('d-m-Y',strtotime($record->created_at))}}</td>
                                                <td class="drag-handle">
                                                    @php
                                                    $typeIds = explode(',', $record->section);
                                                    $types = DB::table('sections')->whereIn('id', $typeIds)->get();
                                                    @endphp
                                                    @foreach ($types as $type)
                                                    {{$type->name}} @if ($types->count() > 1) , @endif


                                                    @endforeach
                                                </td class="drag-handle">
                                                  <td class="drag-handle">{{$record->title}} @if ($record->new == 1) <img src="{{asset('backend/new-animated-gif.gif')}}" alt="" style="width: 3rem;">@endif</td>
                                                <td class="drag-handle">
                                                    <a href="{{ asset('uploads/notification/' . $record->id . '/' . $record->file) }}" target="_blank" class="btn btn-success btn-sm ">
                                                        <i class="fa fa-file-download"></i>
                                                    </a>
                                                </td>
                                                <td  class="drag-handle">
                                                    <div class="d-flex">
                                                        <a href="{{route('notification.view',Crypt::encrypt($record->id))}}" class="btn btn-primary btn-sm " style="margin-right: .3rem;"> <i class="fa fa-eye"></i> </a>
                                                        <a href="{{route('notification.edit',Crypt::encrypt($record->id))}}" class="btn btn-warning btn-sm" style="margin-right: .3rem;"> <i class="fa fa-pen"></i> </a>
                                                        <a href="{{route('notification.delete',Crypt::encrypt($record->id))}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this notification ?')"> <i class="fa fa-trash"></i> </a>
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
                                    {{$notifications->links('pagination::bootstrap-4')}}
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
<script>
    $(document).ready(function() {
        $("#sortable").sortable({
            handle: ".drag-handle",
            update: function(event, ui) {
                // Get the sorted elements
                var sortedElements = $(this).find('.sortable-row');
                console.log(sortedElements);

                // Extract IDs from sorted elements
                var sortedIDs = sortedElements.map(function() {
                    return $(this).data('id');
                }).get();

                // Update the ordering number in the table
                sortedElements.each(function(index) {
                    $(this).find('.sl_no').text(index + 1);
                });

                // Send the updated ordering to the server
                $.ajax({
                    url: "{{ route('update.order.notification') }}",
                    type: 'POST',
                    data: {
                        sortedIDs: sortedIDs,
                        _token: "{{ csrf_token() }}",
                    },
                    success: function(response) {
                        console.log(response);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
        });
    });
</script>
