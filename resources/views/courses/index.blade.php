@extends('courses.master')

@section('content')
<div class="container py-5 ">
    <h1 class="text-center mb-4">All Courses</h1>
    <div class="d-flex align-items-center my-3">
        <p class="m-0">Sort By</p>
        <form class="mx-2 d-flex" action="{{ route('courses.index') }}" method="GET">
            @if (request()->has('page'))
            <input type="hidden" name="page" value="{{ request()->page }}">
            @endif
            <select name="column" class="form-select">
                <option value="id" @selected(request()->column == 'id')>ID</option>
                <option value="name" @selected(request()->column == 'name')>Name</option>
                <option value="price" @selected(request()->column == 'price')>Price</option>
                <option value="created_at" @selected(request()->column == 'created_at')>Created At</option>
            </select>
            <select name="type" class="form-select mx-2">
                <option value="asc" @selected(request()->type == 'asc')>ASC</option>
                <option value="desc" @selected(request()->type == 'desc')>DESC</option>
            </select>
            <button class="btn btn-dark">Sort</button>
        </form>
    </div>
    <table class="table table-bordered table-hover table-striped ">
        <tr class="table-dark">
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Hours</th>
            <th>Status</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Actions</th>
        </tr>
        @foreach ($courses as $course)
        <tr>
            <td>{{ $course->id }}</td>
            <td><img width="100" src='{{ $course->image }}' alt=""></td>
            <td>{{ $course->name }}</td>
            <td>{{ $course->price }}</td>
            <td>{{ $course->hours }}</td>
            <td>{!! $course->status ? '<span class="badge bg-success">Opened</span>' : '<span
                    class="badge bg-danger">Closed</span>' !!}</td>
            <td>{{ $course->created_at->format('M d , Y') }}</td>
            <td>{{ $course->updated_at->diffForHumans() }}</td>
            <td>
                <a href="" class="btn btn-success">Edit</a>
                <a href="" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        @endforeach
    </table>
    {{ $courses->appends($_GET)->links() }}
</div>
@endsection