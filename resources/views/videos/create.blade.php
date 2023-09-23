<x-layouts.base title="Create video">
    <x-form action="{{route('videos.store')}}" method="post">
        @include('videos.form-fields')

        <button>Submit</button>
    </x-form>
</x-layouts.base>