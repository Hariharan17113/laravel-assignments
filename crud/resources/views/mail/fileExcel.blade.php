<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Post_Id</th>
        <th>Title</th>
        <th>Description</th>
    </tr>
    </thead>
    <tbody>
    @forelse($posts as $post)
        @if($post->created_at >= $today)
            <tr>
                <td>{{ $post->user->name }}</td>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->description }}</td>
            </tr>
        @endif
    @empty
        <p>No posts</p>
    @endforelse
</table>
