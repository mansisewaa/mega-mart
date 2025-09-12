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
                <!-- <li class="nav-item">
                    <a href="#">Add</a>
                </li> -->
            </ul>
        </div>
        @include('backend.flash_message')
        <div class="row">
            <div class="col-md-6">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Add</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('menu.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" class="form-control" id="" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Sublink</label>
                                    <input type="checkbox" id="" name="sublink" value="1">
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
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody id="sortable">
                                    @forelse ($menus as $key => $record )
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
                                            <div style="display: flex;">
                                                <a href="{{route('menu.edit',$record->id)}}" class="btn btn-info btn-sm"> <i class="fas fa-edit"></i> </a>
                                                @if($record->status == 1 )
                                                <a href="{{route('menu.change.status',$record->id)}}" class="btn btn-danger btn-sm" style="margin-left:.5rem;">Disable</a>

                                                @else
                                                <a href="{{route('menu.change.status',$record->id)}}" class="btn btn-success btn-sm" style="margin-left:.5rem;">Enable</a>

                                                @endif
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
