<x-layouts.base title="Edit category {{ $category->title }}">
<form method="post" action="{{ route('categories.update', $category->id) }}">
    @csrf
    @method('PUT')
    <div>
        Slug----------<input type="text" name="slug" value="{{ old('slug') ?? $category->slug }}">
        @error('slug')
        <div>
            {{ $message }}
        </div>
        @enderror
    </div>
    Title----------<input type="text" name="title" value="{{ $category->title }}"><br>
    Description: <textarea name="description" id="" cols="30" rows="10">{{ $category->description }}</textarea><br>
    <button>Edit category</button>
</form>
</x-layouts.base>