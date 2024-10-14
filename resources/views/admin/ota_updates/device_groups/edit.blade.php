@extends('layouts.app')

@section('content')
    <nav class="mb-3" aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('rollouts.index') }}">Firmwares</a></li>
            <li class="breadcrumb-item active">Edit Firmware</li>
        </ol>
    </nav>

    <form action="{{ route('device_groups.update', $deviceGroups->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row g-3 flex-between-end mb-5">
            <div class="col-auto">
                <h2 class="mb-2">Edit Device group</h2>
                <h5 class="text-body-tertiary fw-semibold">
                    Update the device group details.
                </h5>
            </div>
            <div class="col-auto">
                <a href="{{ route('rollouts.index') }}" class="btn btn-phoenix-secondary me-2 mb-2 mb-sm-0">Discard</a>
                <button class="btn btn-primary mb-2 mb-sm-0" type="submit">Update</button>
            </div>
        </div>

        <div class="mb-3">
            <label for="name">Group Name</label>
            <input type="text" name="name" class="form-control" value="{{ $deviceGroup->name }}" required>
        </div>

        <div class="form-floating form-floating-advance-select mb-3">
            <label for="floaTingLabelMultipleSelect">Devices</label>
            <select class="form-select" id="floaTingLabelMultipleSelect" name="devices[]" multiple data-choices
                    data-options='{"removeItemButton": true, "placeholder": true}'>
                @foreach ($devices as $device)
                    <option
                        value="{{ $device->id }}" {{ in_array($device->id, $deviceGroup->devices->pluck('id')->toArray()) ? 'selected' : '' }}>
                        {{ $device->name }} ({{ $device->serial_number }})
                    </option>
                @endforeach
            </select>
        </div>

    </form>
@endsection


