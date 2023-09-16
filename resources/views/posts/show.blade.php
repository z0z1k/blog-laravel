<x-layouts.base title="{{ $post->title }}">
<h1> {{ $post->title }} </h1>
<a href="{{ route('posts.index') }}">Back</a>
<hr>
<em>{{ $post->created_at }} </em>
<div>{{ $post->content }}</div>
<div>{{ $post->category->title }}</div>

<a href="{{ route('posts.edit', [ $post->id ]) }}">Edit</a>

<hr>
<h2>Comments</h2>
<x-form method="post" action="{{ route('posts.comment', [ $post->id ]) }}">
<x-form-textarea name="text" label="Write your comment"/>
<button>Send</button>
</x-form>
<hr>

@foreach($comments as $comment)
<div class="alert alert-success mb-3">
{{ $comment->text }}
</div>
@endforeach
</x-layouts.base>