@extends('posts.layout')
@section('contents')
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('posts.create') }}">
                <i class="fas fa-plus-circle"></i>
            </a>
        </div>
    </div>
    <table class="table table-bordered" id="posts-table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Description</th>
            <th>Tags</th>
            <th>Action</th>
        </tr>
        </thead>
    </table>
@stop
@push('scripts')
    <script>
        $(function() {
            $('#posts-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('posts.index') !!}',
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                    { data: 'title', name: 'title' },
                    { data: 'description', name: 'description' },
                    { data: 'tags', name: 'tags'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        });
    </script>
@endpush
