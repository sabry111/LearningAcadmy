@extends('admin.layout')


@section('content')

<div class="d-flex justify-content-between mb-3 pt-5 pb-2">
        <h4>Admins</h4>
        <a href="{{route('admin.admins.create')}}" class="btn btn-sm btn-info">Add New admin</a>
    </div>

    <table class="table">
        <thead class="bg-cyan">
            <tr>
                <th scope="col">#</th>
                <th scope="col">username</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($admins as $admin)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $admin->username }}</td>
                    <td>{{ $admin->email }}</td>
                    <td>
                        <a class="btn btn-info" href="{{ route('admin.admins.edit', $admin->id) }}" role="button">Edit</a>
                        <a class="btn btn-danger" href="#" role="button">Delete</a>
                        {{-- {{ route('admin.admins.delete', $admin->id) }} --}}
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

