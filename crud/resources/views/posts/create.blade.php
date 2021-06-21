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
                    <strong>Title:</strong>
                    <input type="text" name="title" class="form-control" placeholder="Enter Title">
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <strong>Description:</strong>
                    <input type="text" name="description" class="form-control" placeholder="Enter Description">
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <strong>Comments:</strong>
                    <textarea name="comments" class="form-control" placeholder="Enter your Comments"></textarea>
                </div>
            </div>
            <div class="col-md-8">
                <strong>Tags:</strong>
                <div><input type="checkbox" name="tag[]" value="C">
                    <label for="C">C</label></div>
                <div><input type="checkbox" name="tag[]" value="C++">
                    <label for="C++">C++</label></div>
                <div><input type="checkbox" name="tag[]" value="Python">
                    <label for="Python">Python</label></div>
                <div><input type="checkbox" name="tag[]" value="PHP">
                    <label for="PHP">PHP</label></div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
