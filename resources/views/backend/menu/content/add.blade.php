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
            <h3 class="fw-bold mb-3">{{$data->name}}</h3>
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
                    <a href="#">{{$data->name}}</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Add Content</a>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12">
                @include('backend.flash_message')
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"> @if(isset($content)) Edit @else Add  @endif Content</h3>
                    </div>
                    <div class="card-body">

                        <form action="{{route('store-content')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Menu</label>
                                <input type="text" class="form-control" id="" name="name" value="{{$data->name}}" style=" width:30rem;">
                                <input type="hidden" class="form-control" id="" name="slug" value="{{$data->slug}}">
                            </div>
                            @if(isset($content))
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Content</label>
                                    <textarea name="content" class="form-control" id="description" cols="30" rows="10" required> {!! $content->content !!}</textarea>
                                </div>
                            @else
                            <div class="form-group">
                                <label for="exampleInputEmail1">Content</label>
                                <textarea name="content" class="form-control" id="description" cols="30" rows="10" required></textarea>
                            </div>
                            @endif

                            <div class="form-group offset-5">
                                <button type="submit" class="btn btn-primary ">Update </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>


    </div>
</div>
@endsection
@section('js')

<script src={{asset('ckeditor/ckeditor.js')}}></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
    CKEDITOR.replace('description', {
        filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
            customConfig : "{{asset('ckeditor/config.js')}}",
            filebrowserUploadMethod: 'form',
            allowedContent:true,
            height: '300px',
            width: '100%',
            // removePlugins: 'sourcearea'
    })
</script>

@endsection

