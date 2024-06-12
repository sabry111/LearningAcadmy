@extends('admin.layout')

@section('content')
    <div class="container m-5 p-5 ">
        <div class="d-flex justify-content-between mb-3">
            <h4>Students / Show Courses</h4>
            <a href="{{ route('admin.students') }}" class="btn btn-sm btn-info">Back</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $course->name }}</td>
                        <td>{{ $course->pivot->status }}</td>
                        <td>
                            @if ($course->pivot->status !== 'approve')
                                <a class="btn btn-info"
                                    href="{{ route('admin.students.approve', [$student_id, $course->id]) }}"
                                    role="button">Approve</a>
                            @endif

                            @if ($course->pivot->status !== 'reject')
                                <a class="btn btn-danger"
                                    href="{{ route('admin.students.reject', [$student_id, $course->id]) }}"
                                    role="button">Reject</a>
                            @endif
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
