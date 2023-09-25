<x-layouts.base title="Create tag">
    @bind($tag)
    <x-form action="{{route('tags.update', [ $tag->id ])}}" method="put">
        @include('tags.form-fields')
        <button>Submit</button>
    </x-form>
    @endbind
</x-layouts.base>