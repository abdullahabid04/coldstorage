@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Firmware Update Progress</h2>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Device</th>
                <th>Firmware Version</th>
                <th>Progress</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($progresses as $progress)
                <tr>
                    <td>{{ $progress->id }}</td>
                    <td>{{ $progress->device->serial_number }}</td>
                    <td>{{ $progress->firmwareUpdate->firmware->version ?? '' }}</td>
                    <td>{{ $progress->progress }}%</td>
                    <td>{{ $progress->status }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
