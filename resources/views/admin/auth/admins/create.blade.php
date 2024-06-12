@extends('admin.layout')


@section('content')
<div class="container p-5">
<div class="d-flex justify-content-between mb-3">
        <h4>Admins / New</h4>
        <a href="{{ route('admin.admins') }}" class="btn btn-sm btn-info">Back</a>
    </div>
    <form action="{{ route('admin.admins.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="exampleInputname1" class="form-label"> Enter Userame</label>
            <input name="username" class="form-control" id="exampleInputname1" aria-describedby="nameHelp">
            <label for="exampleInputname1" class="form-label"> Enter Email</label>
            <input name="email" class="form-control" id="exampleInputname1" aria-describedby="nameHelp">
            <label for="exampleInputname1" class="form-label"> Enter password</label>
            <input name="passeord" type="password" class="form-control" id="exampleInputname1" aria-describedby="nameHelp">
            <label for="exampleInputname1" class="form-label"> Confirm password</label>
            <input name="password_confirmation" type="password" class="form-control" id="exampleInputname1" aria-describedby="nameHelp">
        </div>
        <button type="submit" class="btn btn-primary">Add </button>
    </form>
@endsection
