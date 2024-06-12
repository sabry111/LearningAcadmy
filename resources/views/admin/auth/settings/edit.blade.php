@extends('admin.layout')


@section('content')
    <div class="container p-5">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <input name="id" type="hidden" value="{{ $settings->id }}" class="form-control">
                <label class="form-label">Edit Name</label>
                <input name="name" value="{{ $settings->name }}" class="form-control">
                <label class="form-label"> Edit Email</label>
                <input name="email" value="{{ $settings->email }}" class="form-control">
                <label class="form-label"> Edit Phone</label>
                <input name="phone" value="{{ $settings->phone }}" class="form-control">
                <label class="form-label"> Edit Logo</label><br>
                <img src="{{ asset('uploads/settings/' . $settings->logo) }}" alt=""><br><br>
                <input name="logo" type="file" class="form-control-file">
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
@endsection
