<x-layouts.base title="{{ $post->title }}">
<h1> {{ $post->title }} </h1>
<a href="/posts">Back</a>
<hr>
<em>{{ $post->created_at }} </em>
<div>{{ $post->content }}</div>
</x-layouts.base>