@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Firmware Updates</h2>
        <a href="{{ route('firmware_updates.create') }}" class="btn btn-primary mb-3">Add New Firmware Update</a>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Firmware Version</th>
                <th>Compatible Models</th>
                <th>Min Version</th>
                <th>Max Version</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($firmwareUpdates as $update)
                <tr>
                    <td>{{ $update->id }}</td>
                    <td>{{ $update->name }}</td>
                    <td>{{ $update->firmware->version }}</td>
                    <td>{{ implode(', ', json_decode($update->compatible_models, true)) }}</td>
                    <td>{{ $update->min_version }}</td>
                    <td>{{ $update->max_version }}</td>
                    <td>{{ ucfirst($update->status) }}</td>
                    <td>
                        <a href="{{ route('firmware_updates.edit', $update->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('firmware_updates.destroy', $update->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
