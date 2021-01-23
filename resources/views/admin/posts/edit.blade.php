@extends('admin.layout')

@section('header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">
                {{ __("Edit post") }}
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
                    {{ __("Edit post") }}
                </li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div>
@endsection

@section('content')

@if ($post->photos->count())
    <div class="card card-default">
        <div class="card-body">
            @foreach ($post->photos as $photo)
                <form method="POST" action="{{ route('admin.photos.destroy', $photo) }}">
                    @csrf @method('DELETE')
                    <div class="col-sm-4 col-md-2 p-1">
                        <button class="btn btn-danger btn-xs"
                            style="position: absolute"
                        >
                            <i class="fas fa-trash"></i>
                        </button>
                        <img class="card-img-top rendering"
                            src="{{ url($photo->url) }}"
                        >
                    </div>
                </form>
            @endforeach
        </div>
    </div>
@endif

<form method="POST" action="{{ route('admin.posts.update', $post) }}">
    @csrf @method('PUT')
    <div class="row">
        <div class="col-md-8">
            <div class="card card-primary">
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">{{__("Title post") }}</label>
                        <input type="title"
                            class="form-control @error('title') is-invalid @else '' @enderror"
                            name="title"
                            id="title"
                            value="{{ old('title', $post->title) }}"
                            placeholder="{{ __("Enter title") }}"
                            required
                        >
                        {{-- {!! $errors->first('title', '<span class="help-group">:message</span>') !!} --}}
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="content">{{__("Content post") }}</label>
                        <textarea name="content"
                            name="content"
                            id="editor"
                            class="form-control @error('content') is-invalid @else '' @enderror"
                            rows="10"
                            placeholder="{{ __("Content post") }}"
                        >
                            {{ old('content', $post->body) }}
                        </textarea>
                        @error('content')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="iframe">{{__("Embedded content (iframe)") }}</label>
                        <textarea name="iframe"
                            name="iframe"
                            id="editor"
                            class="form-control @error('iframe') is-invalid @else '' @enderror"
                            rows="2"
                            placeholder="{{ __("Embedded content (iframe)") }}"
                        >
                            {{ old('iframe', $post->iframe) }}
                        </textarea>
                        @error('iframe')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                        @enderror
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
                                data-target="#reservationdate"
                                value="{{ old('published_at', $post->published_at ? $post->published_at->format('m/d/Y') : null ) }}"
                            />
                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="category">{{__("Category") }}</label>
                        <select name="category"
                            class="form-control @error('category') is-invalid @else '' @enderror"
                            id="category"
                        >
                            <option value="">{{ __("Select category") }}</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category', $post->category_id) == $category->id ? 'selected' : '' }}
                            >
                                {{ $category->name }}
                            </option>
                        @endforeach
                        </select>
                        @error('category')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                        @enderror
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
                                <option value="{{ $tag->id }}"
                                    {{ collect(old('tags', $post->tags->pluck('id')))->contains($tag->id) ? 'selected' : '' }}
                                >
                                    {{ $tag->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="excerpt">{{__("Excerpt post") }}</label>
                        <textarea name="excerpt"
                            id="excerpt"
                            class="form-control @error('excerpt') is-invalid @else '' @enderror"
                            rows="5"
                            placeholder="{{ __("Excerpt post") }}"
                        >
                            {{ old('excerpt', $post->excerpt) }}
                        </textarea>
                        @error('excerpt')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="dropzone"></div>
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
    {{-- Dropzone --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.css">
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
    {{-- Dropzone --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.js"></script>

    <script>
        //Date range picker
        $('#reservationdate').datetimepicker({
            format: 'L'
        });

        // Summernote
        $('#editor').summernote({
            height: 400,
        })

        //Initialize Select2 Elements
        // $('.select2').select2()
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

        var myDropzone = new Dropzone('.dropzone', {
            url: '/admin/posts/{{ $post->url }}/photos',
            paramName: 'photo',
            acceptedFiles: 'image/*',
            maxFilesize: 3,
            maxFiles: 5,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            dictDefaultMessage: '{{ __("Drop files here to upload") }}'
        })

        myDropzone.on('error', function(file, res) {
            //console.log(res);
            var msg = (res.errors.photo[0]);
            $('.dz-error-message > span').text(msg)
        })

        Dropzone.autoDiscover = false
    </script>
@endpush

@endsection
