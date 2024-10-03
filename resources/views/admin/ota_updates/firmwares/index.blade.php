@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Firmware List</h1>
        <a href="{{ route('firmwares.create') }}" class="btn btn-primary mb-3">Add New Firmware</a>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Version</th>
                <th>Checksum</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($firmwares as $firmware)
                <tr>
                    <td>{{ $firmware->id }}</td>
                    <td>{{ $firmware->version }}</td>
                    <td>{{ $firmware->checksum }}</td>
                    <td>
                        <a href="{{ route('firmwares.edit', $firmware->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('firmwares.destroy', $firmware->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
