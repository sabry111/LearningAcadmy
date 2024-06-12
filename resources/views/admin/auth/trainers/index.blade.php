@extends('admin.layout')


@section('content')
    <div class="d-flex justify-content-between mb-3 pt-5 pb-2">
        <h4>Trainers</h4>
        <a href="{{ route('admin.trainers.create') }}" class="btn btn-sm btn-info">Add New Trainer</a>
    </div>

    <table class="table">
        <thead class="bg-cyan">
            <tr>
                <th scope="col">#</th>
                <th scope="col">img</th>
                <th scope="col">Name</th>
                <th scope="col">Specialty</th>
                <th scope="col">Phone</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($trainer as $train)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>
                        <img src="{{ asset('uploads/trainers/' . $train->img) }}" height="50xp" width="50px"
                            alt="">
                    </td>
                    <td>{{ $train->name }}</td>
                    <td>{{ $train->specialty }}</td>
                    <td>
                        @if ($train->phone !== null)
                            {{ $train->phone }}
                        @else
                            not exist
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-info" href="{{ route('admin.trainers.edit', $train->id) }}"
                            role="button">Edit</a>
                        <a class="btn btn-danger" href="{{ route('admin.trainers.delete', $train->id) }}"
                            role="button">Delete</a>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
