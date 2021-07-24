@extends('posts.layout')
@section('content')
@if(Auth::check())
    <div class="row" >
        <div class="col-lg-12">
            <div class="pull-right">
                <a href="{{ route('posts.create') }}" class="btn btn-success" title="Create New Post">Create posts</a>
            </div>
        </div>
    </div>
    <table class="table table-striped table-responsive-lg table-hover" >
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Description</th>
            <th>Comments</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($data as $key => $value)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $value->title }}</td>
                <td>{{ $value->description }}</td>
                <td>{{ $value->comment[0]->comments }}</td>
                <td>
                    <form method="POST">
                        <a class="btn btn-info" href="{{ route('posts.show',$value->id) }}">Show</a>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {!! $data->links() !!}
@else
    <a href=" {{ route('home') }}">Login and continue</a>
@endif
@endsection


