@extends('courses.master')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-4">All Courses</h1>
    <table class="table table-bordered table-hover table-striped ">
        <tr class="table-dark">
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Hours</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Actions</th>
        </tr>
        @foreach ($courses as $course)
        <tr>
            <td>{{ $course->id }}</td>
            <td><img width="100"  src='{{ $course->image }}' alt=""></td>
            <td>{{ $course->name }}</td>
            <td>{{ $course->price }}</td>
            <td>{{ $course->hours }}</td>
            <td>{{ $course->created_at }}</td>
            <td>{{ $course->updated_at }}</td>
            <td>
                <a href="" class="btn btn-success">Edit</a>
                <a href="" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        @endforeach
    </table>
    {{ $courses->links() }}
</div>
@endsection
