@extends('posts.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Post</h2>
            </div>
        </div>
    </div>
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Enter name">
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="text" name="email" class="form-control" placeholder="example@mail.com">
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <strong>Role:</strong>
                    <input type="text" name="role" class="form-control" placeholder="Enter your role">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
