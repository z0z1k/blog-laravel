<x-layouts.base title="Posts in {{ $category->title }}">

<h1>{{ $category->title }}</h1>

@foreach($category->posts as $post)
    {{ $post->title }}
    <hr>
@endforeach
    
</x-layouts.base>