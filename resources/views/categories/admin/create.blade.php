<x-layouts.base title="Create category">
<h1>Create catogory</h1>
<form method="post" action="{{ route('categories.store') }}">
    @include('categories.admin.form-fields')
    <button class="btn btn-primary">Add category</button>
</form>
</x-layouts.base>