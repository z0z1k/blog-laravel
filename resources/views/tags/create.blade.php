<x-layouts.base title="Create tag">
    <x-form action="{{route('tags.store')}}" method="post">
        @include('tags.form-fields')

        <button>Submit</button>
    </x-form>
</x-layouts.base>