@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Device Groups</h2>
        <a href="{{ route('device_groups.create') }}" class="btn btn-primary mb-3">Add New Device Group</a>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Group Name</th>
                <th>Devices Count</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($groups as $group)
                <tr>
                    <td>{{ $group->id }}</td>
                    <td>{{ $group->name }}</td>
                    <td>{{ $group->devices->count() }}</td>
                    <td>
                        <a href="{{ route('device_groups.edit', $group->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('device_groups.destroy', $group->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
{{--                        <a href="{{ route('device_groups.batch_update', $group->id) }}" class="btn btn-info btn-sm">Batch Update</a>--}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
