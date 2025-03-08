@extends('courses.master')

@section('content')
<div class="container py-5 ">
    <h1 class="text-center mb-4">Trashed Courses</h1>
    <a href="{{ route('courses.index') }}" class="btn btn-primary mb-3">All Courses</a>

    <table class="table table-bordered table-hover table-striped ">
        <tr class="table-dark">
            <th>ID</th>
            <th>Name</th>
            <th>Deleted At</th>
            <th>Actions</th>
        </tr>
        @foreach ($courses as $course)
        <tr>
            <td>{{ $course->id }}</td>
            <td>{{ $course->name }}</td>
            <td>{{ $course->deleted_at->diffForHumans() }}</td>
            <td>
                <a href="{{ route('courses.restore',$course->id) }}" class="btn btn-success">Restore</a>
                {{-- <a href="" class="btn btn-danger">Delete</a> --}}
                <form class="d-inline" action="{{ route('courses.destroy',$course->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button onclick="return confirm('Are you sure you want to delete this item?')"
                        class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {{ $courses->appends($_GET)->links() }}
</div>
@endsection
