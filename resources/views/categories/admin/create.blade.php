<x-layouts.base title="Create category">
<h1>Create catogory</h1>
<form method="post" action="{{ route('categories.store') }}">
    @csrf

    <div class="mb-3">
        <x-controls.input name="slug" label="Short url" />
    </div>

    <div class="mb-3">
        <x-controls.input name="title" label="Title" />
    </div>
    
    Description: <textarea name="description" id="" cols="30" rows="10">{{ old('description') }}</textarea><br>
    <button class="btn btn-primary">Add category</button>
</form>
</x-layouts.base>