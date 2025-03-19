<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $post->title }}</title>
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
    <div class="container my-5 text-center">
        <h1 class="text-center mb-4">{{ $post->title }}</h1>
        <img src="{{ $post->image }}" alt="...">
        <p class="mt-5">{{ $post->body }}</p>
        @foreach ($post->tags as $tag)
        <a href="{{ route('relation.related_post',$tag->id) }}" class="badge bg-dark">{{ $tag->name }}></a>
        @endforeach
        <hr>
        <h4 id="comments">All Comments ({{ $post->comments_count }})</h4>
        <div class="text-start">
            @foreach ($post->comments as $comment)
            <b>{{ $comment->user->name }}</b>
            <h6>{{ $comment->content }}</h6>
            @endforeach
        </div>
    </div>
</body>

</html>
