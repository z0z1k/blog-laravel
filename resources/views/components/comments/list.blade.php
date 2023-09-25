@props([
    'comments'
])

@foreach($comments as $comment)
    <div class="alert alert-success">
        {{ $comment->text }}
        <a href="{{ route('comments.edit', [ $comment->id ]) }}">Edit</a>
    </div>
@endforeach