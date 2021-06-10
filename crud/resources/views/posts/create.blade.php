@extends('posts.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Post</h2>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="title" class="form-control" placeholder="Enter name">
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <strong>Description:</strong>
                    <input type="text" name="description" class="form-control" placeholder="Enter description">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
