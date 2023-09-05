@csrf
    <div class="mb-3">
        <x-controls.input name="slug" label="Short url" :item="$category ?? null" />
    </div>

    <div class="mb-3">
        <x-controls.input name="title" label="Title" :item="$category ?? null" />
    </div>
    
    Description: <textarea name="description" id="" cols="30" rows="10">{{ old('description') }}</textarea><br>