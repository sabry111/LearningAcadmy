@extends('admin.layout')


@section('content')
    <div class="container p-5">
        <div class="d-flex justify-content-between mb-3">
            <h4>Categories / Edit / {{ $category->name }}</h4>
            <a href="{{ route('admin.category') }}" class="btn btn-sm btn-info">Back</a>
        </div>
        <form action="{{ route('admin.category.update') }}" method="POST">
            @csrf
            <div class="mb-3">
                <input type="hidden" name="id" value="{{ $category->id }}">
                <label class="form-label"> Edit Name</label>
                <input name="name" class="form-control" value="{{ $category->name }}" aria-describedby="nameHelp">
            </div>
            <button type="submit" class="btn btn-primary">Edit </button>
        </form>
        <div class="container p-5">
        @endsection
