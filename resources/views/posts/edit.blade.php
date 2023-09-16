<x-layouts.base title="Create post">
    @bind($post)
    <x-form action="{{route('posts.update', [ $post->id ])}}" method="put">
        @include('posts.form-fields')
        <button>Submit</button>
    </x-form>
    @endbind
</x-layouts.base>