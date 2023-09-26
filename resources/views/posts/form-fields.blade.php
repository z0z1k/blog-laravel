<div class="mb-3">
    <x-form-input name="title" label="Title" />     
</div>

<div class="mb-3">
    <x-form-textarea name="content" label="Content" />
</div>

<div class="mb-3">
    <x-form-select name="tags[]" label="Tags" :options="$tags" multiple many-relation/>
</div>