@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Firmware</h1>
        <form action="{{ route('firmwares.update', $firmware->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="version">Firmware Version:</label>
                <input type="text" class="form-control" id="version" name="version" value="{{ $firmware->version }}" required>
            </div>
            <div class="form-group">
                <label for="firmware_file">Upload New Firmware (.bin file):</label>
                <input type="file" class="form-control" id="firmware_file" name="firmware_file">
            </div>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
@endsection
