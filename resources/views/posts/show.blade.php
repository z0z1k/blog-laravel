<x-layouts.base title="{{ $post->title }}">
<h1> {{ $post->title }} </h1>
<a href="{{ route('posts.index') }}">Back</a>
<hr>
<em>{{ $post->created_at }} </em>
<div>{{ $post->content }}</div>

<a href="{{ route('posts.edit', [ $post->id ]) }}">Edit</a>
</x-layouts.base>