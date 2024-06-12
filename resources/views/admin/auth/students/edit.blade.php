@extends('admin.layout')


@section('content')

    <div class="container p-5">
        <div class="d-flex justify-content-between mb-3">
            <h4>Students / Edit / {{ $student->name }}</h4>
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
        <form action="{{ route('admin.students.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">

                <input type="hidden" name="id" value="{{ $student->id }}">
                <label class="form-label"> Edit Name</label>
                <input name="name" value="{{ $student->name }}" class="form-control">
                <label class="form-label"> Edit Email</label>
                <input name="email" value="{{ $student->email }}" class="form-control">
                <label class="form-label"> Edit Specialty</label>
                <input name="specialty" value="{{ $student->specialty }}" class="form-control">

            </div>
            <button type="submit" class="btn btn-primary">Edit </button>
        </form>
    </div>
@endsection
