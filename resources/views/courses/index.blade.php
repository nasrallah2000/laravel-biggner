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
            <td>$course['id']</td>
            <td>Image</td>
            <td>Name</td>
            <td>Price</td>
            <td>Hours</td>
            <td>Created At</td>
            <td>Updated At</td>
            <td>Actions</td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
