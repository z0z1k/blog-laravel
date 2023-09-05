<x-layouts.base title="Create post">
<form action="{{route('posts.store')}}" method="post">
    @csrf
    Title---- <input type="text" name="title">
    <br>
    Content <textarea name="content"cols="30" rows="10"></textarea>
    <button>Submit</button>
</form>
</x-layouts.base>