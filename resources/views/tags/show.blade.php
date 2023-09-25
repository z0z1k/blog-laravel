<x-layouts.base title="{{ $tag->title }}">
<a href="{{ route('tags.index') }}">Back</a>
<hr>
<em>{{ $tag->created_at }} </em>
<div>{{ $tag->url }}</div>

<a href="{{ route('tags.edit', [ $tag->id ]) }}">Edit</a>
<hr>

</x-layouts.base>