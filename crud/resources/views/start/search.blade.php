<div>
    @include('layouts.sidebar')
    @if($posts->isNotEmpty())
        @foreach ($posts as $post)
            <div class="post-list">
                <p>
                    <a href="{{route('posts.show', $post->id)}}" >
                        {{ $post->title }}
                    </a>
                </p>
            </div>
        @endforeach

    @else
        <div>
            <h2>No posts found</h2>
        </div>
    @endif
    @if($tags->isNotEmpty())
        @foreach ($tags as $post)
            <div class="post-list">
                <p>
                    <a href="{{ url('show', [$post->tags])}}" >
                        {{ $post->tags }}
                    </a>
                </p>
            </div>
        @endforeach

    @else
        <div>
            <h2>No tags found</h2>
        </div>
    @endif

</div>
