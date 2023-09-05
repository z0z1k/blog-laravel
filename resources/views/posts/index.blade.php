<x-layouts.base title="Blog">
<h1>Blog</h1>
<a href="{{route('posts.create')}}">Add post</a>
<hr>
@foreach ($posts as $post)
    <h2>{{ $post->title }}</h2>
    <a href="/posts/{{$post->id}}">read more...</a>
    <em>{{ $post->created_at }}</em>
    <hr>
@endforeach
</x-layouts.base>