@extends('courses.master')

@section('content')
<div class="container py-5 ">
    <h1 class="text-center mb-4">Add New Course</h1>
    <a href="{{ route('courses.index') }}" class="btn btn-primary mb-3">All Courses</a>
    <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name') }}">
            @error('name')
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
            <label>Content</label>
            <textarea name="content" rows="4" class="form-control @error('content') is-invalid @enderror">
                {{ old('content') }}
            </textarea>
            @error('content')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label>Price</label>
            <input type="number" name="price" class="form-control @error('price') is-invalid @enderror"
                value="{{ old('price') }}">
            @error('price')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label>Hours</label>
            <input type="number" name="hours" class="form-control @error('hours') is-invalid @enderror"
                value="{{ old('hours') }}">
            @error('hours')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button class="btn btn-success">Save</button>
    </form>

</div>
@endsection