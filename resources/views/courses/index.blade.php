@extends('courses.master')

@section('content')
<div class="container py-5 ">
    <h1 class="text-center mb-4">All Courses</h1>
    {{-- @if (session('msg'))
    <div class="alert alert-success alert-dismissible fade show " role="alert">
        {{ session('msg') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif --}}
    <div class="d-flex justify-content-between">
        <a href="{{ route('courses.trash') }}" class="btn btn-danger mb-3">Trash Courses</a>
        <a href="{{ route('courses.create') }}" class="btn btn-success mb-3">Add Course</a>

    </div>
    <form class="mx-2" action="{{ route('courses.index') }}" method="GET">
        @if (request()->has('page'))
        <input type="hidden" name="page" value="{{ request()->page }}">
        @endif
        <div class="row">
            <div class="col-8">
                <input type="text" value="{{request()->q}}" name="q" placeholder="Search About Any Course..."
                    class="form-control">
            </div>
            <div class=" col-3">
                <div class="d-flex align-items-center mb-2">
                    <select name="column" class="form-select w-50">
                        <option value="id" @selected(request()->column == 'id')>ID</option>
                        <option value="name" @selected(request()->column == 'name')>Name</option>
                        <option value="price" @selected(request()->column == 'price')>Price</option>
                        <option value="created_at" @selected(request()->column == 'created_at')>Created At</option>
                    </select>
                    <select name="type" class="form-select mx-2 w-50">
                        <option value="asc" @selected(request()->type == 'asc')>ASC</option>
                        <option value="desc" @selected(request()->type == 'desc')>DESC</option>
                    </select>
                </div>
            </div>
            <div class="col-1">
                <button class="btn btn-primary">Search</button>
            </div>
        </div>
    </form>
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
            <td><img width="100" height="100" src="{{ asset('images/' . $course->image) }}" alt=""></td>
            <td>{{ $course->name }}</td>
            <td>{{ $course->price }}</td>
            <td>{{ $course->hours }}</td>
            <td>{!! $course->status ? '<span class="badge bg-success">Opened</span>' : '<span
                    class="badge bg-danger">Closed</span>' !!}</td>
            <td>{{ $course->created_at->format('M d , Y') }}</td>
            <td>{{ $course->updated_at->diffForHumans() }}</td>
            <td>
                <a href="{{ route('courses.edit',$course) }}" class="btn btn-success">Edit</a>
                {{-- <a href="" class="btn btn-danger">Delete</a> --}}
                <form class="d-inline" action="{{ route('courses.destroy',$course->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="button" onclick="deleteCourse(event)" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {{ $courses->appends($_GET)->links() }}
</div>
@endsection

@section('js')

<script>
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.onmouseenter = Swal.stopTimer;
          toast.onmouseleave = Swal.resumeTimer;
        }
      });
      @if (session('msg'))
      Toast.fire({
        icon: "{{ session('type') }}",
        title: "{{ session('msg') }}"
      });
      @endif
</script>
<script>
    function deleteCourse (e){
        Swal.fire({
            title: "Are you sure delete this course?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
          }).then((result) => {
            if (result.isConfirmed) {
                console.log(e.target.closest('form').submit());
              {{--  Swal.fire({
                title: "Deleted!",
                text: "Your file has been deleted.",
                icon: "success"
              });  --}}
            }
          });
        }
</script>

@endsection