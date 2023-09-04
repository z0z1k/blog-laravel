@props([
    'name',
    'label',
    'type' => 'text',
    'id' => null,
])

@php
if ($id === null) {
    $id = "field-$name";
}
@endphp
<label for="{{ $name }}" class="form-label">{{ $label }}</label>
<input
    type="{{ $type }}"
    class="form-control
    @error($name) is-invalid @enderror"
    id="{{ $id }}"
    name="{{ $name }}"
    value="{{ old($name) }}"
>
@error($name)
    <div class="invalid-feedback">{{ $message }}</div>
@enderror
