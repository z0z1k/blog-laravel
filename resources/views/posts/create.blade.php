<x-layouts.base title="Create post">
    <x-form action="{{route('posts.store')}}" method="post">
        @include('posts.form-fields')

        <button>Submit</button>
    </x-form>
</x-layouts.base>