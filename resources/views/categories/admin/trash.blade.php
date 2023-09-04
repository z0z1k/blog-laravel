<x-layouts.base title="Categories in trash">
<h1>Categories in trash</h1>

<table border="1" width="80%">
    <tbody>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Created at</th>
            <th></th>
        </tr>
    @foreach($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->title }}</td>
            <td>{{ $category->created_at }}</td>
            <td>
                <form method="post" action="{{ route('categories.restore', [ $category->id ]) }}">
                    @csrf
                    @method('PUT')
                    <button>Restore</button>
                </form>
            </td>
            <td>
                <form method="post" action="{{ route('categories.remove', [ $category->id ]) }}">
                    @csrf
                    @method('DELETE')
                    <button>Delete forever</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</x-layouts.base>