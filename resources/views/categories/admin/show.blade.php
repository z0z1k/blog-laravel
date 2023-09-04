<x-layouts.base title="{{ $category->title }}">
<h1> {{ $category->title }} </h1>
<a href="{{ route('categories.index') }} ">Back</a>
<hr>
<em>{{ $category->slug }} </em>
<div>{{ $category->description }}</div>
<hr>
<a href="{{ route('categories.edit', [$category->id]) }}">edit</a>

<form action="{{ route('categories.destroy', [$category->id]) }}" method="post">
    @csrf
    @method('DELETE')
    <button>Delete category</button>
</form>
</x-layouts.base>