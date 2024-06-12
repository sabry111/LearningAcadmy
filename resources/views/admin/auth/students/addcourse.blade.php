@extends('admin.layout')


@section('content')
    <div class="container m-5 p-5 ">
        <div class="d-flex justify-content-between mb-3">
            <h4>Student / Add Courses </h4>
            <a href="{{ route('admin.students') }}" class="btn btn-sm btn-info">Back</a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.students.addcourse', $student_id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <input type="hidden" name="id" value="{{ $student_id }}">
                <label for="exampleFormControlSelect1">Select Course</label>
                <select name="course_id" class="form-control">
                    @foreach ($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success">Rejster</button>
        </form>
    @endsection
</div>
