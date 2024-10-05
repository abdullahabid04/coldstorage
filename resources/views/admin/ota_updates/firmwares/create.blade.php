@extends('layouts.app')

@section('content')
    <nav class="mb-3" aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('firmwares.index') }}">Firmwares</a></li>
            <li class="breadcrumb-item active">Add Firmware</li>
        </ol>
    </nav>

    <form action="{{ route('firmwares.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row g-3 flex-between-end mb-5">
            <div class="col-auto">
                <h2 class="mb-2">Create Firmware</h2>
                <h5 class="text-body-tertiary fw-semibold">
                    Add a new firmware.
                </h5>
            </div>
            <div class="col-auto">
                <a href="{{ route('firmwares.index') }}" class="btn btn-phoenix-secondary me-2 mb-2 mb-sm-0">Discard</a>
                <button class="btn btn-primary mb-2 mb-sm-0" type="submit">Add Firmware</button>
            </div>
        </div>

        <div class="mb-3">
            <label for="version">Firmware Version:</label>
            <input type="text" class="form-control" id="version" name="version" required>
        </div>

        <div>
            <label for="firmware_file">Upload Firmware (.bin file):</label>
            <input type="file" class="form-control" id="firmware_file" name="firmware_file" required>
        </div>
    </form>
@endsection
