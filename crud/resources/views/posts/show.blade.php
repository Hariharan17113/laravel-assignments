@extends('posts.layout')
@section('contents')
    <div class="col-md-12 margin-tb">
        <div class="pull-left">
            <h2> Show Post</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('posts.index') }}">
                <i class="fas fa-home"></i>
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                {{ $post->title }}
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                {{ $post->description }}
            </div>
        </div>
        <div class="col-md-12 form-group">
            <strong>Tags:</strong>
            @foreach($tags as $key => $tag)
                {{ $tag[0]->tags }}
            @endforeach
        </div>
        <div class="col-md-12 form-group">
            <strong>Comments:</strong>
            @foreach($comment->comments as $key => $c)
                <form action="{{ route('comments.destroy',$c->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div>
                    <li style="padding-left: 20px">{{ $c->comments }}
                    <button id="mediumButton" type="submit" class="btn btn-danger" style="margin-left: 20px">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                    </li></div>
                </form>
            @endforeach
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <form action="{{ route('posts.destroy',$post->id) }}" method="POST">
                <a id="mediumButton" class="btn btn-primary" type="button" data-attr="{{ route('posts.edit', $post->id) }}" data-toggle="modal" data-target="#exampleModalLong">
                    <i class="fas fa-edit fa-lg"></i>
                </a>
                @csrf
                @method('DELETE')
                <button id="mediumButton" type="submit" class="btn btn-danger">
                <i class="fas fa-trash-alt"></i>
                </button>
            </form>
        </div>
    </div>
    <div class="card-footer col-md-12">
        <form action="{{route('comments.store',$post->id)}}" method="POST">
            @csrf
            <div class="col-md-8 form-group">
                <strong>Add comments</strong>
                <textarea name="comments" class="form-control" placeholder="Enter your Comments"></textarea>
            </div>
            <div class="col-xs-8 col-sm-8 col-md-8 form-group">
                <button id="mediumButton" type="submit" class="btn btn-primary">Add comment</button>
            </div>
        </form>
    </div>
    <div class="container">
        <div>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Edit posts</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('posts.update',$post->id) }}" method="POST">
                            <div class="modal-body">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Title:</strong>
                                            <input type="text" name="title" class="form-control" placeholder="Enter Title" value="{{$post->title}}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Description:</strong>
                                            <input type="text" name="description" class="form-control" placeholder="Enter Description" value="{{$post->description}}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
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
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        </div>
    </div>
@endsection
