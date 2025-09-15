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
            <h3 class="fw-bold mb-3">Brochure File</h3>
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
        <div class="row" style="display: flex; justify-content:start;">
            <div class="col-md-8">
                @include('backend.flash_message')
                <div class="card ">

                    <div class="card-header" style="display: flex; justify-content:space-between;">
                        <h4 class="card-title">List</h4>
                    </div>
                    <div class="card-body">
                        <div>
                            <form action="{{ route('brochure.upload-store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" class="form-control" id="" placeholder="Enter title" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Upload File</label>
                                    <input type="file" class="form-control" id="" name="file">
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-sm">Upload</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="display: flex; justify-content:center;">
            <div class="col-md-12">
                @include('backend.flash_message')
                <div class="card ">

                    <div class="card-header" style="display: flex; justify-content:space-between;">
                        <h4 class="card-title">File</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover text-center">
                                <thead>
                                    <tr>
                                        <th>SL No</th>
                                        <th>Title</th>
                                        <th>File</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($brochurefile as $key => $file)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $file->name}}</td>
                                        <td>
                                            <a href="{{asset('uploads/brochures/'.$file->file)}}" class="btn btn-primary btn-sm" style="margin:.3rem;" target="_blank"> File</a>
                                        </td>
                                        <td>
                                            @if($file->status == 1)
                                            <a href="{{ route('brochure.status',$file->id)}}" class="btn btn-danger btn-sm"> Disable</a>
                                            @else($file->status == 0)
                                            <a href="{{ route('brochure.status',$file->id)}}" class="btn btn-primary btn-sm"> Enable</a>
                                            @endif
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center">No data found</td>
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
