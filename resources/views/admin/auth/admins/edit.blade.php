@extends('admin.layout')


@section('content')
    <div class="container m-5 p-5 ">
        <div class="d-flex justify-content-between mb-3">
            <h4>Admins / Edit / {{ $admin->username }}</h4>
            <a href="{{ route('admin.admins') }}" class="btn btn-sm btn-info">Back</a>
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
        <form action="{{ route('admin.admins.update') }}" method="POST">
            @csrf
            <div class="mb-3">
                <input type="hidden" name="id" value="{{ $admin->id }}">
                <label class="form-label"> Edit username</label>
                <input name="username" class="form-control" value="{{ $admin->username }}" aria-describedby="nameHelp">
                <label class="form-label"> Edit Email</label>
                <input name="email" class="form-control" value="{{ $admin->email }}" aria-describedby="nameHelp">

                <label for="exampleInputPassword1">Old Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                    placeholder="New Password">

                <label class="form-label">New Password</label>
                <input type="password" name="password_confirmation" class="form-control" aria-describedby="nameHelp"
                    placeholder="Confirm Password">
            </div>
            <button type="submit" class="btn btn-primary">Edit Admin </button>
        </form>
    @endsection
</div>
