<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expired Membership Users</title>
</head>
<body>
    <h1>List of Users with Expired Membership</h1>

    @if($users->isEmpty())
        <p>No users with expired memberships.</p>
    @else
        <table border="1">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Membership Expiry Date</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if($user->status == 0)
                                Expired
                            @else
                                Active
                            @endif
                        </td>
                        <td>{{ $user->membership_expiry_date ?? 'N/A' }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->updated_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>
