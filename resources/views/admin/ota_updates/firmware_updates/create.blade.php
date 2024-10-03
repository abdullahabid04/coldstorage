@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create Firmware Update</h2>
        <form action="{{ route('firmware_updates.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Firmware Update Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <label for="firmware_id">Firmware Version</label>
                <select name="firmware_id" class="form-control" required>
                    @foreach ($firmwares as $firmware)
                        <option value="{{ $firmware->id }}">{{ $firmware->version }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="compatible_models">Compatible Models</label>
                <input type="text" name="compatible_models[]" class="form-control" required placeholder="Enter models (comma separated)">
            </div>
            <div class="form-group">
                <label for="min_version">Min Version</label>
                <input type="text" name="min_version" class="form-control">
            </div>
            <div class="form-group">
                <label for="max_version">Max Version</label>
                <input type="text" name="max_version" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
