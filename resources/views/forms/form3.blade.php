<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form 3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Full Form</h1>
        {{-- Global Errors --}}
        {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif --}}
        <form action="{{ route('form3_data') }}" method="POST">
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
                <label>Email</label>
                <input type="email" name="email" placeholder="Email"
                    class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                @error('email')
                <small class=" text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label>Date of Birth</label>
                <input type="date" name="dob" class="form-control @error('dob') is-invalid @enderror"
                    value="{{ old('dob') }}">
                @error('dob')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label class="pe-3">Gender :</label>

                <input type="radio" name="gender" id="mail" value="mail" @checked(old('gender')=='mail' )>
                <label for="mail" class="pe-3">Mail</label>
                <input type="radio" name="gender" id="femail" value="femail" {{ old('gender')=='femail' ?'checked' :''
                    }}> <label for="femail">Femail</label>
                <br>
                @error('gender')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label>Education level</label>
                <select class="form-select @error('education_level') is-invalid @enderror" name="education_level">
                    <option value="Shcool" @selected(old('education_level')=='Shcool' )>Shcool</option>
                    <option value="Diploma" @selected(old('education_level')=='Diploma' )>Diploma</option>
                    <option value="Bachelor" @selected(old('education_level')=='Bachelor' )>Bachelor</option>
                    <option value="Master" @selected(old('education_level')=='Master' )>Master</option>
                    <option value="PhD" @selected(old('education_level')=='PhD' )>PhD</option>

                </select>
                @error('education_level')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            @dump(old('hobbies'))
            <div class="mb-3">
                <label>Hobbies</label><br>
                <label><input type="checkbox" name="hobbies[]" value="Swimming"
                        @checked(in_array('Swimming',old('hobbies')??[]))> Swimming</label><br>
                <label><input type="checkbox" name="hobbies[]" value="Reading"
                        @checked(in_array('Reading',old('hobbies')??[]))>
                    Reading</label><br>
                <label><input type="checkbox" name="hobbies[]" value="Writing"
                        @checked(in_array('Writing',old('hobbies')??[]))>
                    Writing</label><br>
                <label><input type="checkbox" name="hobbies[]" value="Codding"
                        @checked(in_array('Codding',old('hobbies')??[]))>
                    Codding</label><br>
                @error('hobbies')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label>Bio</label>
                <textarea name="bio" placeholder="Bio" class="form-control @error('bio') is-invalid @enderror"
                    rows="4">{{ old('bio') }}</textarea>
                @error('bio')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <button class="btn btn-success px-3">Send</button>
    </div>


    </form>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>