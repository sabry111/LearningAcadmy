@extends('admin.layout')


@section('content')
    <div class="d-flex justify-content-between mb-3 pt-5 pb-2">
        <h4>Courses</h4>
        <a href="{{ route('admin.courses.create') }}" class="btn btn-sm btn-info">Add New Courses</a>
    </div>

    <table class="table">
        <thead class="bg-cyan">
            <tr>
                <th scope="col">#</th>
                <th scope="col">img</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Trainers</th>
                <th scope="col">Categories</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($courses as $course)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>
                        <img src="{{ asset('uploads/courses/' . $course->img) }}" height="50xp" width="50px"
                            alt="">
                    </td>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->price }}</td>
                    <td>{{ ($course->trainer)->name }}</td>
                    <td>{{ ($course->category)->name }}</td>
                    <td>
                        <a class="btn btn-info" href="{{ route('admin.courses.edit', $course->id) }}"
                            role="button">Edit</a>
                        <a class="btn btn-danger" href="{{ route('admin.courses.delete', $course->id) }}"
                            role="button">Delete</a>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
