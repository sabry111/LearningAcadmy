@extends('admin.layout')


@section('content')

<div class="d-flex justify-content-between mb-3 pt-5 pb-2">
        <h4>Students</h4>
        <a href="{{ route('admin.students.create') }}" class="btn btn-sm btn-info">Add New students</a>
    </div>

    <table class="table">
        <thead class="bg-cyan">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Specialty</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->specialty }}</td>
                    <td>
                        <a class="btn btn-info" href="{{ route('admin.students.edit', $student->id) }}"
                            role="button">Edit</a>
                        <a class="btn btn-primary" href="{{ route('admin.students.courses', $student->id) }}"
                            role="button">Courses</a>
                        <a class="btn btn-success" href="{{ route('admin.students.register', $student->id) }}"
                            role="button">Register</a>
                        <a class="btn btn-danger" href="{{ route('admin.students.delete', $student->id) }}"
                            role="button">Delete</a>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
@endsection


