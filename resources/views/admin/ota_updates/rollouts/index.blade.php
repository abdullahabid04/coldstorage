@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Rollouts</h2>
        <a href="{{ route('rollouts.create') }}" class="btn btn-primary mb-3">Create New Rollout</a>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Firmware Version</th>
                <th>Device Group</th>
                <th>Scheduled Time</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($rollouts as $rollout)
                <tr>
                    <td>{{ $rollout->id }}</td>
                    <td>{{ $rollout->firmwareUpdate->firmware->version }}</td>
                    <td>{{ $rollout->deviceGroup->name }}</td>
                    <td>{{ $rollout->scheduled_at }}</td>
                    <td>{{ $rollout->status }}</td>
                    <td>
                        <a href="{{ route('rollouts.edit', $rollout->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('rollouts.destroy', $rollout->id) }}" method="POST" style="display:inline;">
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
