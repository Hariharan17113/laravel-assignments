{{--@section('content')--}}
{{--    <div class="row">--}}
{{--        <div class="col-lg-12 margin-tb">--}}
{{--            <div class="pull-left">--}}
{{--                <h2>Edit Product</h2>--}}
{{--            </div>--}}
{{--            <div class="pull-right">--}}
{{--                <a class="btn btn-primary" href="{{ route('posts.index') }}"> Back</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    @if ($errors->any())--}}
{{--        <div class="alert alert-danger">--}}
{{--            <strong>Whoops!</strong> There were some problems with your input.<br><br>--}}
{{--            <ul>--}}
{{--                @foreach ($errors->all() as $error)--}}
{{--                    <li>{{ $error }}</li>--}}
{{--                @endforeach--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    @endif--}}
{{--    <form action="{{ route('posts.update',$post->id) }}" method="POST">--}}
{{--        @csrf--}}
{{--        @method('PUT')--}}
{{--        <div class="row">--}}
{{--            <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--                <div class="form-group">--}}
{{--                    <strong>Title:</strong>--}}
{{--                    <input type="text" name="title" class="form-control" placeholder="Enter Title" value="{{$post->title}}">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--                <div class="form-group">--}}
{{--                    <strong>Description:</strong>--}}
{{--                    <input type="text" name="description" class="form-control" placeholder="Enter Description" value="{{$post->description}}">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--                <div class="form-group">--}}
{{--                    <strong>Comment:</strong>--}}
{{--                    <textarea name="comments" class="form-control" placeholder="Comment">{{$comment->find($post->id)->comments}}</textarea>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--                <div class="form-group">--}}
{{--                    <strong>Tags:</strong>--}}
{{--                    <div><input type="checkbox" checked="false" name="tag[]" value="C">--}}
{{--                        <label for="C">C</label></div>--}}
{{--                    <div><input type="checkbox" name="tag[]" value="C++">--}}
{{--                        <label for="C++">C++</label></div>--}}
{{--                    <div><input type="checkbox" name="tag[]" value="Python">--}}
{{--                        <label for="Python">Python</label></div>--}}
{{--                    <div><input type="checkbox" name="tag[]" value="PHP">--}}
{{--                        <label for="PHP">PHP</label></div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-xs-12 col-sm-12 col-md-12 text-center">--}}
{{--                <button type="submit" class="btn btn-primary">Submit</button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </form>--}}
{{--@endsection--}}
