@extends('admin.layout')

@section('header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">
                {{ __("Create post") }}
            </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin') }}">
                        {{ __('Home') }}
                    </a>
                </li>
                <li class="breadcrumb-item active">
                    {{ __("Create post") }}
                </li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div>
@endsection

@section('content')
<form method="POST" action="{{ route('admin.posts.store') }}">
    @csrf
    <div class="row">
        <div class="col-md-8">
            <div class="card card-primary">
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">{{__("Title post") }}</label>
                        <input type="title" 
                            class="form-control" 
                            name="title" 
                            id="title" 
                            placeholder="{{ __("Enter title") }}"
                        >
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="content">{{__("Content post") }}</label>
                        <textarea name="content" 
                            name="content"
                            id="editor" 
                            class="form-control" 
                            rows="10"
                            placeholder="{{ __("Content post") }}">
                        </textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-primary">
                <div class="card-body">
                    <div class="form-group">
                        <label for="published_at">Date</label>
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <input type="text" 
                                name="published_at" 
                                class="form-control datetimepicker-input" 
                                data-target="#reservationdate"/
                            >
                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="category">{{__("Category") }}</label>
                        <select class="form-control" 
                            name="category" 
                            id="category"
                        >
                            <option>{{ __("Select category") }}</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>                        
                    </div>

                    <div class="form-group">
                        <label for="tags">{{__("Tags") }}</label>
                        <select class="form-control select2bs4" 
                            multiple="multiple"
                            name="tags[]" 
                            id="tag" 
                            data-placeholder="Select tags" 
                            style="width: 100%;"
                        >
                            <option>{{ __("Select tags") }}</option>
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="excerpt">{{__("Excerpt post") }}</label>
                        <textarea name="excerpt" id="excerpt" class="form-control" rows="5"
                            placeholder="{{ __("Excerpt post") }}">
                            </textarea>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-block">{{ __("Save")}} </button>
                </div>
            </div>
        </div>
    </div>
</form>
@push('styles')
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="/admin-lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="/admin-lte/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="/admin-lte/plugins/summernote/summernote-bs4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="/admin-lte/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/admin-lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
@endpush

@push('scripts')
    <!-- InputMask -->
    <script src="/admin-lte/plugins/moment/moment.min.js"></script>
    <!-- date-range-picker -->
    <script src="/admin-lte/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="/admin-lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="/admin-lte/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- Select2 -->
    <script src="/admin-lte/plugins/select2/js/select2.full.min.js"></script>
    <script>
        //Date range picker
        $('#reservationdate').datetimepicker({
            format: 'L'
        });

        // Summernote
        $('#editor').summernote()

        //Initialize Select2 Elements
        // $('.select2').select2()
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    </script>
@endpush

@endsection
