<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Send Email</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <div class="container my-5">
        <h1>Send Email Form</h1>
        <form action="{{ route('email_data') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" placeholder="Name"
                    class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" placeholder="Email"
                    class="form-control @error('email') is-invalid @enderror">
                @error('email')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label>Phone</label>
                <input type="text" name="phone" placeholder="Phone"
                    class="form-control @error('phone') is-invalid @enderror">
                @error('phone')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label>Subject</label>
                <input type="text" name="subject" placeholder="Subject"
                    class="form-control @error('subject') is-invalid @enderror">
                @error('subject')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label>Image</label>
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                @error('image')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label>Message</label>
                <textarea name="message" rows="4" placeholder="Message"
                    class="form-control @error('message') is-invalid @enderror"></textarea>
                @error('message')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>


            <button class="btn btn-dark">Send</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>