@extends('admin.layout')


@section('content')
    <div class="d-flex justify-content-between mb-3 pt-5 pb-2">
        <h4>Categories</h4>
        <a href="{{ route('admin.category.create') }}" class="btn btn-sm btn-info">Add New Category</a>
    </div>

    <table class="table">
        <thead class="bg-cyan">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($category as $categ)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $categ->name }}</td>
                    <td>
                        <a class="btn btn-info" href="{{ route('admin.category.edit', $categ->id) }}" role="button">Edit</a>
                        <a class="btn btn-danger" href="{{ route('admin.category.delete', $categ->id) }}"
                            role="button">Delete</a>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
