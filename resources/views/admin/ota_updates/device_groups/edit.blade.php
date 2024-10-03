@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Device Group</h2>
        <form action="{{ route('device_groups.update', $deviceGroup->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Group Name</label>
                <input type="text" name="name" class="form-control" value="{{ $deviceGroup->name }}" required>
            </div>
            <div class="form-floating form-floating-advance-select">
                <label for="floaTingLabelMultipleSelect">Devices</label>
                <select class="form-select" id="floaTingLabelMultipleSelect" name="devices[]" multiple data-choices data-options='{"removeItemButton": true, "placeholder": true}'>
                    @foreach ($devices as $device)
                        <option value="{{ $device->id }}" {{ in_array($device->id, $deviceGroup->devices->pluck('id')->toArray()) ? 'selected' : '' }}>
                            {{ $device->name }} ({{ $device->serial_number }})
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
