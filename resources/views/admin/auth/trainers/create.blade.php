@extends('admin.layout')


@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h4>Trainers / New</h4>
        <a href="{{ route('admin.trainers') }}" class="btn btn-sm btn-info">Back</a>
    </div>
    <form action="{{ route('admin.trainers.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Upload Img</label>
            <input name="img" type="file" class="form-control-file">
            <label class="form-label"> Enter Name</label>
            <input name="name" class="form-control">
            <label class="form-label"> Enter Specialty</label>
            <input name="specialty" class="form-control">
            <label class="form-label"> Enter Phone</label>
            <input name="phone" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Add </button>
    </form>
@endsection
