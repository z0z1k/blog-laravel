<form method="post" action="{{ route('categories.store') }}">
    @csrf
    <div>
        Slug----------<input type="text" name="slug" value="{{ old('slug') }}">
        @error('slug')
        <div>
            {{ $message }}
        </div>
        @enderror
    </div>
    Title----------<input type="text" name="title" value="{{ old('title') }}"><br>
    Description: <textarea name="description" id="" cols="30" rows="10">{{ old('description') }}</textarea><br>
    <button>Add category</button>
</form>