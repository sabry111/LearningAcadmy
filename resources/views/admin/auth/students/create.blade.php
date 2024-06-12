@extends('admin.layout')


@section('content')
    <div class="container m-5 p-5 ">
        <div class="d-flex justify-content-between mb-3">
            <h4>Students / New</h4>
            <a href="{{ route('admin.students') }}" class="btn btn-sm btn-info">Back</a>
        </div>

        <form action="{{ route('admin.students.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label"> Enter Name</label>
                <input name="name" class="form-control">
                <label class="form-label"> Email</label>
                <input name="email" class="form-control">
                <label class="form-label">Spesialty</label>
                <input name="specialty" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Add </button>
        </form>
    @endsection
</div>
