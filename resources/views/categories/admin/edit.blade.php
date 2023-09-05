<x-layouts.base title="Edit category {{ $category->title }}">
<form method="post" action="{{ route('categories.update', $category->id) }}">
    @csrf
    @method('PUT')
    @include('categories.admin.form-fields')
    <button>Edit category</button>
</form>
</x-layouts.base>