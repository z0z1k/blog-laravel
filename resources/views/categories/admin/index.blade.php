<h1>Categries</h1>
<a href="{{ route('categories.create') }}">Add category</a>
<a href="{{ route('categories.trash') }}">Trash</a>

<hr>
@foreach ($categories as $category)
    <h2>{{ $category->title }}</h2>
    <a href="{{ route('categories.show', [ $category->id ]) }}">read more...</a>
    <em>{{ $category->created_at }}</em>
    <hr>
@endforeach