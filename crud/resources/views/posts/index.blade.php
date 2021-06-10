@extends('posts.layout')
@section('content')
    <div class="row" style="margin-top: 50px;">
        <div class="col-lg-12">
            <div class="pull-right">
                <a href="{{ route('posts.create') }}" title="Create New Post"><i class="fas fa-plus-circle fa-lg"></i></a>
            </div>
        </div>
    </div>
    <table class="table table-striped table-responsive-lg table-hover" >
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($data as $value)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->email }}</td>
                <td>{{ $value->role }}</td>
                <td>
                    <form method="POST">
                        <a href="{{ route('posts.show',$value->id) }}"><i class="fas fa-eye text-success  fa-lg"></i></a>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {!! $data->links() !!}
@endsection


