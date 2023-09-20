@foreach($users as $user)
    <tr>
        <td>{{ $user->email }}</td>

        <td>{{ $user->created_at }}</td>
    </tr>
@endforeach
