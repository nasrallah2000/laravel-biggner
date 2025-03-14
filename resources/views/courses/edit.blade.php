@extends('courses.master')

@section('content')
<div class="container py-5 ">
    <h1 class="text-center mb-4">Edit {{ $course->name }} Course</h1>
    <a href="{{ route('courses.index') }}" class="btn btn-primary mb-3">All Courses</a>
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                value="{{ $course->name }}">
            @error('name')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <img class="mb-2" width="100" height="100" src="{{ asset('images/'.$course->image) }}" alt="">

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
                {{ $course->content }}
            </textarea>
            @error('content')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label>Price</label>
            <input type="number" name="price" class="form-control @error('price') is-invalid @enderror"
                value="{{  $course->price }}">
            @error('price')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label>Hours</label>
            <input type="number" name="hours" class="form-control @error('hours') is-invalid @enderror"
                value="{{ $course->hours }}">
            @error('hours')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button class="btn btn-success">Save</button>
    </form>

</div>
@endsection