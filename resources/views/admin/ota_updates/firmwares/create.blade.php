@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add New Firmware</h1>
        <form action="{{ route('firmwares.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="version">Firmware Version:</label>
                <input type="text" class="form-control" id="version" name="version" required>
            </div>
            <div class="form-group">
                <label for="firmware_file">Upload Firmware (.bin file):</label>
                <input type="file" class="form-control" id="firmware_file" name="firmware_file" required>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
@endsection
