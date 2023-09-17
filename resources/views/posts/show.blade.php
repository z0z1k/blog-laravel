<x-layouts.base title="{{ $post->title }}">
<h1> {{ $post->title }} </h1>
<a href="{{ route('posts.index') }}">Back</a>
<hr>
<em>{{ $post->created_at }} </em>
<div>{{ $post->content }}</div>

<a href="{{ route('posts.edit', [ $post->id ]) }}">Edit</a>

<x-form action="{{ route('comments.store') }}" method="post">
    <input type="hidden" name="for" value="post">
    <input type="hidden" name="id" value="{{ $post->id }}">
    <x-form-textarea name="text" />
    <button>Send</button>
</x-form>
<hr>

@foreach($post->comments as $comment)
    <div class="alert alert-success">
        {{ $comment->text }}
    </div>
@endforeach
</x-layouts.base>