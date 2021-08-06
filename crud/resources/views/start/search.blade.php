@include('layouts.sidebar')
    @if($posts->isNotEmpty())
        <table class="table table-striped table-responsive-lg table-hover" >
            <div style="margin-bottom: 10px;" class="pull-right">
                <a class="btn btn-primary" href="{{ route('welcome') }}">
                    Home
                </a>
            </div>
            <strong><h3>Posts</h3></strong>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Description</th>
            </tr>
            <?php $i=0; ?>
            @foreach ($posts as $key => $value)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $value->title }}</td>
                    <td>{{ $value->description }}</td>
                </tr>
            @endforeach
        </table>
    @else
        <div>
            <h2>No post found</h2>
        </div>
    @endif
    @if($tags->isNotEmpty())
        <strong><h3>Tags</h3></strong>
        @foreach ($tags as $post)
            <div class="post-list">
                <p>
                    <span style="margin-left: 10px;" class="badge badge-light">
                        <a href="{{ url('index', [$post->id]) }}">{{ $post->tags }}</a>
                    </span>
                </p>
            </div>
        @endforeach

    @else
        <div>
            <h2>No tag found</h2>
        </div>
    @endif
