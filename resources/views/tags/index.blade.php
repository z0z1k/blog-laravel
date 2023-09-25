<x-layouts.base title="Blog">
<a href="{{route('tags.create')}}">Add tag</a>
<hr>
@foreach ($tags as $tag)
    <h2>{{ $tag->title }}</h2>
    <em>{{ $tag->url }}</em>
    <a href="{{ route('tags.show', [ $tag->id ]) }}">read more...</a>
    <em>{{ $tag->created_at }}</em>
    <hr>
@endforeach
</x-layouts.base>