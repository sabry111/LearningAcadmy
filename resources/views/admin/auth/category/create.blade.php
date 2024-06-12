@extends('admin.layout')


@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h4>Categories / New</h4>
        <a href="{{ route('admin.category') }}" class="btn btn-sm btn-info">Back</a>
    </div>
    <form action="{{ route('admin.category.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="exampleInputname1" class="form-label"> Enter Name</label>
            <input name="name" class="form-control" id="exampleInputname1" aria-describedby="nameHelp">
        </div>
        <button type="submit" class="btn btn-primary">Add </button>
    </form>
@endsection
