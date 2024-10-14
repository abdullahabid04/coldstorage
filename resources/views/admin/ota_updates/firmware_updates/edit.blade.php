@extends('layouts.app')

@section('content')
    <nav class="mb-3" aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('firmware_updates.index') }}">Firmware Updates</a></li>
            <li class="breadcrumb-item active">Edit Firmware update</li>
        </ol>
    </nav>

    <form action="{{ route('firmware_updates.update', $firmwareUpdate->id) }}" method="POST">
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
            <label for="name">Firmware Update Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $firmwareUpdate->name) }}">
        </div>

        <div class="mb-3">
            <label for="firmware_id">Firmware Version</label>
            <select name="firmware_id" class="form-control" required>
                @foreach ($firmwares as $firmware)
                    <option value="{{ $firmware->id }}" {{ $firmware->id == $firmwareUpdate->firmware_id ? 'selected' : '' }}>
                        {{ $firmware->version }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="compatible_models">Compatible Models</label>
            <input type="text" name="compatible_models[]" class="form-control" value="{{ implode(',', json_decode($firmwareUpdate->compatible_models, true)) }}" required>
        </div>

        <div class="mb-3">
            <label for="min_version">Min Version</label>
            <input type="text" name="min_version" class="form-control" value="{{ $firmwareUpdate->min_version }}">
        </div>

        <div class="mb-3">
            <label for="max_version">Max Version</label>
            <input type="text" name="max_version" class="form-control" value="{{ $firmwareUpdate->max_version }}">
        </div>
    </form>
@endsection



