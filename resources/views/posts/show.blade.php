<x-layouts.base title="{{ $post->title }}">
<a href="{{ route('posts.index') }}">Back</a>
<hr>
<em>{{ $post->created_at }} </em>
<div>{{ $post->content }}</div>

<a href="{{ route('posts.edit', [ $post->id ]) }}">Edit</a>

<x-comments.form for="post" :id="$post->id" />

<hr>

<x-comments.list :comments="$post->comments" />
</x-layouts.base>