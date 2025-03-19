<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Related Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body>
    <div class="container my-5 text-center">
        <h1 class="text-center mb-4">Related Posts</h1>
        @foreach ($related_posts->posts as $post)
        <a href="{{  route('relation.post_single',$post->id)}}" style="text-decoration: none; color: inherit;">
            <div class="d-flex mb-3">
                <img height="100" width="100" src="{{ $post->image }}" alt="...">
                <div class="text-start ms-5">
                    <b class="">{{ $post->title }}</b>
                    <p>{{ $post->body }}</p>
                </div>
            </div>
        </a>
        @endforeach
        <hr>
        {{-- <h4 id="comments">All Comments ({{ $post->comments_count }})</h4> --}}
        <div class="text-start">

        </div>
    </div>
</body>

</html>
