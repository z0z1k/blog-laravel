<x-layouts.base title="Users">
    <table class="table table-bordered">
        <tbody>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Actions
            </tr>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="{{ route('users.roles', [ $user->id]) }}">Change role</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-layouts.base>