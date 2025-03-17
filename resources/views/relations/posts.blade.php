<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <style>
        .card-title {
            height: 48px;
        }

        .card-text {
            height: 74px;
        }
    </style>
</head>

<body>
    <div class="container my-5">
        <h1 class="text-center mb-4">All Posts</h1>
        <div class="row mb-3">
            @foreach ($posts as $post)
            <div class="col-md-3">
                <div class="card mx-1 my-1">
                    <img src="{{ $post->image }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <b><i class="fas fa-user"></i> {{ $post->user->name }}</b>
                        <br>
                        <b><i class="fas fa-comments"></i> {{ $post->comments->count() }}</b>
                        <p class="card-text">{{ Str::words($post->body,10,'...') }}</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{ $posts->links() }}
    </div>
</body>

</html>
