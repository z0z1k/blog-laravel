<x-layouts.base title="Video: {{ $video->code }}">
<a href="{{ route('videos.index') }}">Back</a>
<hr>
<em>{{ $video->created_at }} </em>
<div>{{ $video->code }}</div>
    <iframe width="420" height="315"
    src="https://www.youtube.com/embed/{{$video->code}}">
    </iframe>
<a href="{{ route('videos.edit', [ $video->id ]) }}">Edit</a>

<x-form action="{{ route('comments.store') }}" method="post">
    <input type="hidden" name="for" value="video">
    <input type="hidden" name="id" value="{{ $video->id }}">
    <x-form-textarea name="text" />
    <button>Send</button>
</x-form>
<hr>

@foreach($video->comments as $comment)
    <div class="alert alert-success">
        {{ $comment->text }}
        <a href="{{ route('comments.edit', [ $comment->id ]) }}">Edit</a>
    </div>
@endforeach
</x-layouts.base>