<x-layouts.base title="Create post">
    <x-form action="{{route('posts.update', [ $post->id ])}}" method="put">
        @include('posts.form-fields')
        <button>Submit</button>
    </x-form>
</x-layouts.base>