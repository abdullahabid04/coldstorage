@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Device Update Logs</h2>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Device</th>
                <th>Firmware Version</th>
                <th>Log Message</th>
                <th>Log Type</th>
                <th>Timestamp</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($logs as $log)
                <tr>
                    <td>{{ $log->id }}</td>
                    <td>{{ $log->device->serial_number }}</td>
                    <td>{{ $log->firmwareUpdate->firmware->version ?? 'N / A' }}</td>
                    <td>{{ $log->message }}</td>
                    <td>{{ $log->level }}</td>
                    <td>{{ $log->created_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
