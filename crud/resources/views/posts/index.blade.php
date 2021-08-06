@extends('posts.layout')
@section('content')
    <div class="row" >
        <div class="col-lg-12">
            <div class="pull-right">
                <p>
                    <a href="{{ route('posts.create') }}" class="btn btn-success" title="Create New Post">Create New posts</a>
                </p>
            </div>
        </div>
    </div>
    <table class="table table-striped table-responsive-lg table-hover" >
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Description</th>
            <th>Tags</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($data as $key => $value)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $value->title }}</td>
                <td>{{ $value->description }}</td>
                <td>
                @foreach ($value->tags as $key => $tags)
                {{ $tags->tags }}
                @endforeach
                </td>
                <td>
                    <form method="POST">
                        <a class="btn btn-info" href="{{ route('posts.show',$value->id) }}">Show</a>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {!! $data->links() !!}
@endsection


