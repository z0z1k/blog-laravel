<x-layouts.base title="Videos">
<a href="{{route('videos.create')}}">Add video</a>
<hr>
@foreach ($videos as $video)
    <h2>{{ $video->code }}</h2>
    <a href="{{ route('videos.show', [ $video->id ]) }}">read more...</a>
    
    <em>{{ $video->created_at }}</em>
    <hr>
@endforeach
</x-layouts.base>