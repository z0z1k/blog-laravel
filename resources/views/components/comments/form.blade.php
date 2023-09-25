@props([
    'for',
    'id'
])

<x-form action="{{ route('comments.store') }}" method="post">
    <input type="hidden" name="for" value="{{ $for }}">
    <input type="hidden" name="id" value="{{ $id }}">
    <x-form-textarea name="text" />
    <button class="btn btn-primary mb-3">Send</button>
</x-form>