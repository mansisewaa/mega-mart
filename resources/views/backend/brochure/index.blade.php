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
            <h3 class="fw-bold mb-3">Brochure Downloads</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="#">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>

            </ul>
        </div>
        <div class="row" style="display: flex; justify-content:center;">
                    <div class="col-md-12">
                        @include('backend.flash_message')
                        <div class="card ">

                            <div class="card-header" style="display: flex; justify-content:space-between;">
                                <h4 class="card-title">List</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover text-center">
                                        <thead>
                                            <tr>
                                                <th>SL No</th>
                                                <th>Date & Time</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Company Name</th>
                                                <th>Message</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           @forelse($data as $d)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ date('d-m-Y h:i A', strtotime($d->created_at)) }}</td>
                                                    <td>{{ $d->name }}</td>
                                                    <td>{{ $d->email }}</td>
                                                    <td>{{ $d->company_name }}</td>
                                                    <td>{{ $d->message }}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="6" class="text-center">No data found</td>
                                                </tr>
                                            @endforelse
                                        </tbody>

                                    </table>
                                    <div class="d-flex justify-content-center">
                                        {!! $data->links() !!}
                                    </div>
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
