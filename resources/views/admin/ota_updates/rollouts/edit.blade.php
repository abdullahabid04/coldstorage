@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Scheduled Update</h2>
        <form action="{{ route('rollouts.update', $scheduledUpdate->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="firmware_id">Select Firmware</label>
                <select name="firmware_id" class="form-control" required>
                    @foreach ($firmwares as $firmware)
                        <option value="{{ $firmware->id }}" {{ $firmware->id == $scheduledUpdate->firmware_id ? 'selected' : '' }}>
                            {{ $firmware->version }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="device_group_id">Select Device Group</label>
                <select name="device_group_id" class="form-control" required>
                    @foreach ($deviceGroups as $group)
                        <option value="{{ $group->id }}" {{ $group->id == $scheduledUpdate->device_group_id ? 'selected' : '' }}>
                            {{ $group->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="staged_rollout">Staged Rollout</label>
                <select name="staged_rollout" class="form-control">
                    <option value="1" {{ $firmwareUpdate->staged_rollout ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ !$firmwareUpdate->staged_rollout ? 'selected' : '' }}>No</option>
                </select>
            </div>
            <div class="form-group">
                <label for="rollout_percentage">Rollout Percentage</label>
                <input type="number" name="rollout_percentage" class="form-control" value="{{ $firmwareUpdate->rollout_percentage }}" min="0" max="100">
            </div>
            <div class="form-group">
                <label for="scheduled_time">Scheduled Time</label>
                <input type="datetime-local" name="scheduled_time" class="form-control" value="{{ $scheduledUpdate->scheduled_time->format('Y-m-d\TH:i') }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Schedule</button>
        </form>
    </div>
@endsection
