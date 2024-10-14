@extends('layouts.app')

@section('content')
    <nav class="mb-3" aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('rollouts.index') }}">Rollouts</a></li>
            <li class="breadcrumb-item active">Add Rollout</li>
        </ol>
    </nav>

    <form action="{{ route('rollouts.store') }}" method="POST" id="rolloutForm">
        @csrf

        <div class="row g-3 flex-between-end mb-5">
            <div class="col-auto">
                <h2 class="mb-2">Create Rollout</h2>
                <h5 class="text-body-tertiary fw-semibold">
                    Add a new rollout.
                </h5>
            </div>
            <div class="col-auto">
                <a href="{{ route('rollouts.index') }}" class="btn btn-phoenix-secondary me-2 mb-2 mb-sm-0">Discard</a>
                <button class="btn btn-primary mb-2 mb-sm-0" type="submit">Schedule Update</button>
            </div>
        </div>

        <div class="mb-3">
            <label for="firmware_update_id">Select Firmware</label>
            <select name="firmware_update_id" class="form-control" required>
                @foreach ($firmwareUpdates as $firmwareUpdate)
                    <option value="{{ $firmwareUpdate->id }}">{{ $firmwareUpdate->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="device_group_id">Select Device Group</label>
            <select name="device_group_id" class="form-control" id="deviceGroupSelect">
                <option value="">-- Select Device Group --</option>
                @foreach ($deviceGroups as $group)
                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="device_id">Select Device</label>
            <select name="device_id" class="form-control" id="deviceSelect">
                <option value="">-- Select Device --</option>
                @foreach ($devices as $device)
                    <option value="{{ $device->id }}">{{ $device->serial_number }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="staged_rollout">Staged Rollout</label>
            <select name="staged_rollout" class="form-control">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="rollout_percentage">Rollout Percentage</label>
            <input type="number" name="rollout_percentage" class="form-control" min="0" max="100">
        </div>

        <div class="mb-3">
            <label for="scheduled_at">Scheduled Time</label>
            <input type="datetime-local" name="scheduled_at" class="form-control" required>
        </div>
    </form>
@endsection


@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const deviceGroupSelect = document.getElementById('deviceGroupSelect');
            const deviceSelect = document.getElementById('deviceSelect');
            const form = document.getElementById('rolloutForm');

            // Disable one select if the other is selected
            deviceGroupSelect.addEventListener('change', function () {
                if (deviceGroupSelect.value !== '') {
                    deviceSelect.disabled = true; // Disable Device select
                } else {
                    deviceSelect.disabled = false; // Enable Device select if no group is selected
                }
            });

            deviceSelect.addEventListener('change', function () {
                if (deviceSelect.value !== '') {
                    deviceGroupSelect.disabled = true; // Disable Device Group select
                } else {
                    deviceGroupSelect.disabled = false; // Enable Device Group select if no device is selected
                }
            });

            // Form submission validation
            form.addEventListener('submit', function (event) {
                if (deviceGroupSelect.value === '' && deviceSelect.value === '') {
                    event.preventDefault(); // Prevent form submission
                    alert('Please select either a Device Group or a Device.');
                }
            });
        });
    </script>
@endpush
