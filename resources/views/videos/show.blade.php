<x-layouts.base title="Video: {{ $video->code }}">
<a href="{{ route('videos.index') }}">Back</a>
<hr>
<em>{{ $video->created_at }} </em>
<div>{{ $video->code }}</div>
    <iframe width="420" height="315"
    src="https://www.youtube.com/embed/{{$video->code}}">
    </iframe>
<a href="{{ route('videos.edit', [ $video->id ]) }}">Edit</a>

<x-comments.form for="video" :id="$video->id" />
<x-comments.list :comments="$video->comments" />
<hr>


</x-layouts.base>