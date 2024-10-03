@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Firmware Update</h2>
        <form action="{{ route('firmware_updates.update', $firmwareUpdate->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Firmware Update Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $firmwareUpdate->name) }}">
            </div>
            <div class="form-group">
                <label for="firmware_id">Firmware Version</label>
                <select name="firmware_id" class="form-control" required>
                    @foreach ($firmwares as $firmware)
                        <option value="{{ $firmware->id }}" {{ $firmware->id == $firmwareUpdate->firmware_id ? 'selected' : '' }}>
                            {{ $firmware->version }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="compatible_models">Compatible Models</label>
                <input type="text" name="compatible_models[]" class="form-control" value="{{ implode(',', json_decode($firmwareUpdate->compatible_models, true)) }}" required>
            </div>
            <div class="form-group">
                <label for="min_version">Min Version</label>
                <input type="text" name="min_version" class="form-control" value="{{ $firmwareUpdate->min_version }}">
            </div>
            <div class="form-group">
                <label for="max_version">Max Version</label>
                <input type="text" name="max_version" class="form-control" value="{{ $firmwareUpdate->max_version }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
