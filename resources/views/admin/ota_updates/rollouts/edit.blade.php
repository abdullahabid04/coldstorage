@extends('layouts.app')

@section('content')
    <nav class="mb-3" aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('rollouts.index') }}">Firmwares</a></li>
            <li class="breadcrumb-item active">Edit Firmware</li>
        </ol>
    </nav>

    <form action="{{ route('rollouts.update', $rollout->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row g-3 flex-between-end mb-5">
            <div class="col-auto">
                <h2 class="mb-2">Edit Rollout</h2>
                <h5 class="text-body-tertiary fw-semibold">
                    Update the rollout details.
                </h5>
            </div>
            <div class="col-auto">
                <a href="{{ route('rollouts.index') }}" class="btn btn-phoenix-secondary me-2 mb-2 mb-sm-0">Discard</a>
                <button class="btn btn-primary mb-2 mb-sm-0" type="submit">Update Schedule</button>
            </div>
        </div>

        <div class="mb-3">
            <label for="firmware_id">Select Firmware</label>
            <select name="firmware_id" class="form-control" required>
                @foreach ($firmwares as $firmware)
                    <option
                        value="{{ $firmware->id }}" {{ $firmware->id == $scheduledUpdate->firmware_id ? 'selected' : '' }}>
                        {{ $firmware->version }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="device_group_id">Select Device Group</label>
            <select name="device_group_id" class="form-control" required>
                @foreach ($deviceGroups as $group)
                    <option
                        value="{{ $group->id }}" {{ $group->id == $scheduledUpdate->device_group_id ? 'selected' : '' }}>
                        {{ $group->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="staged_rollout">Staged Rollout</label>
            <select name="staged_rollout" class="form-control">
                <option value="1" {{ $firmwareUpdate->staged_rollout ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ !$firmwareUpdate->staged_rollout ? 'selected' : '' }}>No</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="rollout_percentage">Rollout Percentage</label>
            <input type="number" name="rollout_percentage" class="form-control"
                   value="{{ $firmwareUpdate->rollout_percentage }}" min="0" max="100">
        </div>

        <div class="mb-3">
            <label for="scheduled_time">Scheduled Time</label>
            <input type="datetime-local" name="scheduled_time" class="form-control"
                   value="{{ $scheduledUpdate->scheduled_time->format('Y-m-d\TH:i') }}" required>
        </div>

    </form>
@endsection

