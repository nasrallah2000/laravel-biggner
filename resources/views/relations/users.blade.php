<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container my-5">
        <h1 class="text-center mb-4">All Users</h1>
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Facebook</th>
                <th>Twitter</th>
                <th>Phone</th>
            </tr>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->profile->fb }}</td>
                <td>{{ $user->profile->tw}}</td>
                <td>{{ $user->profile->phone }}</td>
            </tr>
            @endforeach
        </table>
    </div>
</body>

</html>
