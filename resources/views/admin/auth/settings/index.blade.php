@extends('admin.layout')


@section('content')
    <table class="table">
        <thead class="bg-cyan">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Logo</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>{{ $settings->name }}</td>
                <td>{{ $settings->email }}</td>
                <td>{{ $settings->phone }}</td>
                <td>
                    <img src="{{ asset('uploads/settings/' . $settings->logo) }}" alt="">

                </td>
                <td>
                    <a class="btn btn-success" href="{{ route('admin.settings.edit', $settings->id) }}"
                        role="button">Edit</a>
                </td>
            </tr>
        </tbody>
    </table>
    <table class="table">
        <thead class="bg-cyan">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Facebook</th>
                <th scope="col">Twitter</th>
                <th scope="col">Instagram</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>{{ $settings->facebook }}</td>
                <td>{{ $settings->twitter }}</td>
                <td>{{ $settings->instagram }}</td>
                <td>
                    <a class="btn btn-success" href="#" role="button">Edit</a>
                </td>
            </tr>
        </tbody>
    </table>
    <table class="table">
        <thead class="bg-cyan">
            <tr>
                <th scope="col">#</th>
                <th scope="col">City</th>
                <th scope="col">Address</th>
                <th scope="col">Favicon</th>
                <th scope="col">Work Hours</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>{{ $settings->city }}</td>
                <td>{{ $settings->address }}</td>
                <td>
                    <img src="{{ asset('uploads/settings/' . $settings->favicon) }}" alt="">

                </td>
                <td>{{ $settings->work_hours }}</td>
                <td>
                    <a class="btn btn-success" href="#" role="button">Edit</a>
                </td>
            </tr>
        </tbody>
    </table>


    <table class="table">
        <thead class="bg-cyan">
            <tr>
                <th scope="col">#</th>

                <th scope="col">Map</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>

                <td>{{ $settings->map }}</td>
                <td>
                    <a class="btn btn-success" href="#" role="button">Edit</a>
                </td>
            </tr>
        </tbody>
    </table>
@endsection
