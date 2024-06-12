@extends('admin.layout')


@section('content')
<div class="container p-5">
    <div class="d-flex justify-content-between mb-3">
        <h4>Trainers / Edit / {{ $trainer->name }}</h4>
        <a href="{{ route('admin.trainers') }}" class="btn btn-sm btn-info">Back</a>
    </div>
    <form action="{{ route('admin.trainers.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <input type="hidden" name="id" value="{{ $trainer->id }}">
            <label class="form-label"> Edit Name</label>
            <input name="name" class="form-control" value="{{ $trainer->name }}" aria-describedby="nameHelp">
            <label class="form-label"> Edit Phone</label>
            <input name="phone" class="form-control" value="{{ $trainer->phone }}" aria-describedby="nameHelp">
            <label class="form-label"> Edit Specialty</label>
            <input name="specialty" class="form-control" value="{{ $trainer->specialty }}" aria-describedby="nameHelp">
            <label class="form-label pt-2"> Edit Photo</label><br>
            <img class="my-2" height="120px" src="{{ asset('uploads/trainers/' . $trainer->img) }}">
            <input type="file" name="img" class="form-control-file pt-2">
        </div>
        <button type="submit" class="btn btn-primary">Edit </button>
    </form>
</div>
@endsection
