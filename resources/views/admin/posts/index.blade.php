@extends('admin.layout')

@section('header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">
                    {{ __('All posts') }}
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
                        {{ __('All posts') }}
                    </li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
@endsection

@section('content')
    <h1>{{ __('Posts')}}</h1>
    <div class="card">
        <div class="card-header card-primary">
            <h3 class="card-title">
                {{ __('List of publications') }}
            </h3>
            <div class="card-tools">
                <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                        <button class="btn btn-primary"
                            data-toggle="modal"
                            data-target="#modal-create"
                        >
                            {{ __('Create publications') }}
                        </button>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="posts-table" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>{{ __('Title') }}</th>
                        <th>{{ __('Excerpt') }}</th>
                        <th>{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->excerpt }}</td>
                            <td>
                                <a href="{{ route('posts.show', $post) }}"
                                    class="btn btn-xs btn-default"
                                    target="_blank"
                                >
                                    <i class="far fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-xs btn-info">
                                    <i class="far fa-edit"></i>
                                </a>
                                <a href="#" class="btn btn-xs btn-danger">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection

@push('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/admin-lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/admin-lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endpush

@push('scripts')
    <!-- DataTables  & Plugins -->
    <script src="/admin-lte/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/admin-lte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/admin-lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="/admin-lte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/admin-lte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>

    <script>
        $(function () {
            // $("#example1").DataTable({
            //     "responsive": true,
            //     "lengthChange": false,
            //     "autoWidth": false,
            //     "buttons": [
            //         "copy",
            //         "csv",
            //         "excel",
            //         "pdf",
            //         "print",
            //         "colvis"
            //     ]
            // }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

            $('#posts-table').DataTable({
                "paging": true,
                "lengthChange": false,
                //"searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endpush
