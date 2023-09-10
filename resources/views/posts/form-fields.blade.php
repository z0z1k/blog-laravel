<div class="mb-3">
    <x-form-input name="title" label="Title" />     
</div>

<div class="mb-3">
    <x-form-textarea name="content" label="Content" />
</div>

<div class="mb-3">
    <x-form-select name="category_id" label="Category" :options="$categories" placeholder="Select the category" />
</div>