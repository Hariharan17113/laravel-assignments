@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-right">
                <p>
                    <a class="btn btn-danger" href="{{ route('roles.index') }}"> Cancel</a>
                </p>
            </div>
        </div>
    </div>
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
        <tr>
            <form action="{{ route('roles.update',$role->id) }}" method="POST">
                @csrf
                @method('PUT')
                <td>{{ $role->name }}</td>
                <input type="text" name="name" value="{{ $role->name }}" hidden>
                @foreach($permission as $value)
                    <td>
                        <label>
                            {{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                        </label>
                    </td>
                @endforeach
                <td>
                    <button type="submit" class="btn btn-primary">Save</button>
                </td>
            </form>
        </tr>
    </table>
@endsection

