@extends('layouts.app')

@section('content')
    <nav class="mb-3" aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('firmware_updates.index') }}">Firmware Updates</a></li>
            <li class="breadcrumb-item active">Add Firmware Update</li>
        </ol>
    </nav>

    <form action="{{ route('firmware_updates.store') }}" method="POST">
        @csrf

        <div class="row g-3 flex-between-end mb-5">
            <div class="col-auto">
                <h2 class="mb-2">Create Firmware update</h2>
                <h5 class="text-body-tertiary fw-semibold">
                    Add a new firmware update.
                </h5>
            </div>
            <div class="col-auto">
                <a href="{{ route('firmware_updates.index') }}"
                   class="btn btn-phoenix-secondary me-2 mb-2 mb-sm-0">Discard</a>
                <button class="btn btn-primary mb-2 mb-sm-0" type="submit">Create</button>
            </div>
        </div>

        <div class="mb-3">
            <label for="name">Firmware Update Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
        </div>

        <div class="mb-3">
            <label for="firmware_id">Firmware Version</label>
            <select name="firmware_id" class="form-control" required>
                @foreach ($firmwares as $firmware)
                    <option value="{{ $firmware->id }}">{{ $firmware->version }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="compatible_models">Compatible Models</label>
            <input type="text" name="compatible_models[]" class="form-control" required
                   placeholder="Enter models (comma separated)">
        </div>

        <div class="mb-3">
            <label for="min_version">Min Version</label>
            <input type="text" name="min_version" class="form-control">
        </div>

        <div class="mb-3">
            <label for="max_version">Max Version</label>
            <input type="text" name="max_version" class="form-control">
        </div>
    </form>
@endsection

