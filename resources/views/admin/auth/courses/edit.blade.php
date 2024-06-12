@extends('admin.layout')


@section('content')
<div class="container p-5">
    <div class="d-flex justify-content-between mb-3">
        <h4>Courses / Edit / {{ $course->name }}</h4>
        <a href="{{ route('admin.courses') }}" class="btn btn-sm btn-info">Back</a>
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
    <form action="{{ route('admin.courses.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">

            <input type="hidden" name="id" value="{{ $course->id }}">
            <label class="form-label"> Edit Name</label>
            <input name="name" value="{{ $course->name }}" class="form-control">
            <label for="exampleFormControlSelect1">Edit Category</label>
            <select name="category_id" class="form-control">
                @foreach ($category as $cat)
                    <option value="{{ $course->category->id }}"
                        @if ($course->category_id == $cat->id) selected="selected"
                        @else @endif>
                        {{ $cat->name }}</option>
                @endforeach
            </select>
            <label for="exampleFormControlSelect1">Edit Trainer</label>
            <select name="trainer_id" class="form-control">
                @foreach ($trainers as $trainer)
                    <option value="{{ $course->trainer_id }}"
                        @if ($course->trainer_id == $trainer->id) selected="selected"
                    @else @endif>
                        {{ $trainer->name }}</option>
                @endforeach
            </select>
            <label class="form-label">Edit Small Desc</label>
            <input name="small_desc" value="{{ $course->small_desc }}" class="form-control">
            <label class="form-label">Edit Desc</label>
            <textarea name="desc" class="form-control">{{ $course->desc }}</textarea>
            <label class="form-label">Edit Price</label>
            <input name="price" value="{{ $course->price }}" class="form-control">
            <label class="form-label">Upload Img</label><br>
            <img class="my-2" height="120px" src="{{ asset('uploads/courses/' . $course->img) }}">
            <input name="img" type="file" class="form-control-file">
        </div>
        <button type="submit" class="btn btn-primary">Edit </button>
    </form>
</div>
@endsection
