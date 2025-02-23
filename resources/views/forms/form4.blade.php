<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form 3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .error-message {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #f8d7da;
            color: #721c24;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            font-family: Arial, sans-serif;
        }

        .error-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .error-list li {
            margin-bottom: 5px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h1>Upload Form</h1>
        <form action="{{ route('form4_data') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" placeholder="Name"
                    class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                @error('name')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label>Image</label>
                <input type="file" multiple name="image[]" class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('image') }}">
                @error('image')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <button class="btn btn-success">Upload</button>
        </form>



    </div>

    @if ($errors->any())
    <div id="errorMessage" class="error-message">
        <ul class="error-list">
            @foreach ($errors->all() as $message)
            <li>{{ $message }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <script>
        @if ($errors->any())
            window.onload = function() {
                setTimeout(function() {
                    var errorMessage = document.getElementById('errorMessage');
                    if (errorMessage) {
                        errorMessage.style.display = 'none';
                    }
                }, 5000); // Hide the message after 5 seconds
            };
        @endif
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
