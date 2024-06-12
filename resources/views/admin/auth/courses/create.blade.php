@extends('admin.layout')


@section('content')
    <div class="container m-5 p-5 ">
        <div class="d-flex justify-content-between mb-3">
            <h4>Courses / New</h4>
            <a href="{{ route('admin.courses') }}" class="btn btn-sm btn-info">Back</a>
        </div>

        <form action="{{ route('admin.courses.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label"> Enter Name</label>
                <input name="name" class="form-control">
                <label for="exampleFormControlSelect1">Select Category</label>
                <select name="category_id" class="form-control">
                    @foreach ($category as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                </select>
                <label for="exampleFormControlSelect1">select Trainer</label>
                <select name="trainer_id" class="form-control">
                    @foreach ($trainers as $trainer)
                        <option value="{{ $trainer->id }}">{{ $trainer->name }}</option>
                    @endforeach
                </select>
                <label class="form-label"> Small Desc</label>
                <input name="small_desc" class="form-control">
                <label class="form-label">Desc</label>
                <textarea name="desc" class="form-control"></textarea>
                <label class="form-label">Price</label>
                <input name="price" class="form-control">
                <label class="form-label">Upload Img</label>
                <input name="img" type="file" class="form-control-file">
            </div>
            <button type="submit" class="btn btn-primary">Add </button>
        </form>
    @endsection
</div>
