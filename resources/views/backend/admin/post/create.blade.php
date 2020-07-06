@extends('backend.layouts.master')
@section("title","Post Create")
@push('css')
    <link rel="stylesheet" href="{{asset('backend/plugins/select2/select2.min.css')}}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{asset('backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
@endpush
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Post Create</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Post Create</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
            <!-- general form elements -->
                <div class="card card-info card-outline">
                <div class="card-header">
                    <h3 class="card-title float-left">Create Post</h3>
                    <div class="float-right">
                        <a href="{{route('admin.post.index')}}">
                            <button class="btn btn-success">
                                <i class="fa fa-backward"> </i>
                                Back
                            </button>
                        </a>
                    </div>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                    <form role="form" action="{{route('admin.post.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="section">Select Section</label>
                                        <select class="form-control" name="section" id="section">
                                            <option value="0">Section 1</option>
                                            <option value="1">Section 2</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="type">Select Post Type</label>
                                        <select class="form-control" name="type" id="type">
                                            <option value="0">Image Post</option>
                                            <option value="1">Video Post</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="title">Post Title</label>
                                <input type="text" class="form-control" name="title" id="title" placeholder="Enter Post Title">
                            </div>
                            <div class="form-group">
                                <label for="url">URL</label>
                                <input type="text" class="form-control" name="url" id="url" placeholder="Enter Post Url">
                            </div>
                            <div class="form-group">
                                <label for="image">Post Image</label>
                                <input type="file" class="form-control-file" name="image" id="image">
                            </div>
                            <div class="form-group">
                                <label for="description">Post Description</label>
                                <textarea type="text" class="form-control textarea" name="description" id="description" placeholder="Enter Post Title"></textarea>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="publish"  name="publish">
                                <label for="publish" class="custom-control-label">Publish</label>
                            </div>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
            </div>
            </div>
        </div>
    </section>

@stop
@push('js')
    <script src="{{asset('backend/plugins/select2/select2.full.min.js')}}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{asset('backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
    <script>
        //Initialize Select2 Elements
        $('.select2').select2();
        $('.textarea').wysihtml5({
            toolbar: { fa: true }
        })
    </script>
@endpush
