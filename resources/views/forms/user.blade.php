<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container">
        <h1 class="my-5">Your Name and Date of Birht</h1>
        <form action="{{ route("user_data") }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="mb-3">Name</label>
                <input type="text" name="name" placeholder="Name" class="form-control">
            </div>
            <div class="mb-3">
                <label class="mb-3">Age</label>
                <input type="date" name="age" class="form-control">
            </div>
            <button class="btn btn-success">Send</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>
</body>

</html>
