@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create New Rollout</h2>
        <form action="{{ route('rollouts.store') }}" method="POST" id="rolloutForm">
            @csrf

            <div class="form-group">
                <label for="firmware_update_id">Select Firmware</label>
                <select name="firmware_update_id" class="form-control" required>
                    @foreach ($firmwareUpdates as $firmwareUpdate)
                        <option value="{{ $firmwareUpdate->id }}">{{ $firmwareUpdate->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="device_group_id">Select Device Group</label>
                <select name="device_group_id" class="form-control" id="deviceGroupSelect">
                    <option value="">-- Select Device Group --</option>
                    @foreach ($deviceGroups as $group)
                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="device_id">Select Device</label>
                <select name="device_id" class="form-control" id="deviceSelect">
                    <option value="">-- Select Device --</option>
                    @foreach ($devices as $device)
                        <option value="{{ $device->id }}">{{ $device->serial_number }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="staged_rollout">Staged Rollout</label>
                <select name="staged_rollout" class="form-control">
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>

            <div class="form-group">
                <label for="rollout_percentage">Rollout Percentage</label>
                <input type="number" name="rollout_percentage" class="form-control" min="0" max="100">
            </div>

            <div class="form-group">
                <label for="scheduled_at">Scheduled Time</label>
                <input type="datetime-local" name="scheduled_at" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Schedule Update</button>
        </form>
    </div>
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
