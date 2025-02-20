<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forms</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Basic Form</h1>
        <form action="{{ route('form1_data')}}" method="post">
            @csrf
            <div class="mb-5">
                <label for="">Name</label>
                <input type="text" placeholder="Name" class="form-control" name="name">
            </div>

            <div class="mb-5">
                <label for="">Email</label>
                <input type="email" placeholder="Email" class="form-control" name="email">
            </div>
            <button class="btn btn-success">Send</button>
        </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>