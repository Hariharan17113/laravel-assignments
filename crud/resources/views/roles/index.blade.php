@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-right">
                <p>
                @can('role-create')
                    <a class="btn btn-success" href="{{ route('roles.create') }}"> Create New Role</a>
                @endcan
                </p>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table style="text-align: center;" class="table table-striped table-responsive-lg table-hover">
        <tr>
            <th rowspan="2">Name</th>
            <th colspan="4">Role</th>
            <th colspan="4">Post</th>
            <th width="280px" rowspan="2">Action</th>
        </tr>
        <tr>
            <th>List</th>
            <th>Create</th>
            <th>Edit</th>
            <th>Delete</th>
            <th>List</th>
            <th>Create</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach ($roles as $i => $role)
            <tr>
                <td>{{ $role->name }}</td>
                @foreach($permission as $j => $value)
                    <td>
                        <label>
                            @if( in_array($value->id,$roleAndPermissions[$i]['permission_id']))
                                <span style='font-size:24px;color:green'>&#10004;</span>
                            @else
                                <span style='font-size:24px;color:red'>&times;</span>
                            @endif
                        </label>
                    </td>
                @endforeach
                <td>
                    <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>
                    @can('role-edit')
                        <a class="btn btn-primary" href="{{ route('roles.edit',$role->id)}}">Edit</a>
                    @endcan
                    @can('role-delete')
                       {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                       {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                       {!! Form::close() !!}
                    @endcan
                </td>
            </tr>
        @endforeach
    </table>
    {!! $roles->render() !!}
@endsection
