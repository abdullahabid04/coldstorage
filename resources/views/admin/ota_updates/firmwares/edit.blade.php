@extends('layouts.app')

@section('content')
    <nav class="mb-3" aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('firmwares.index') }}">Firmwares</a></li>
            <li class="breadcrumb-item active">Edit Firmware</li>
        </ol>
    </nav>

    <form action="{{ route('firmwares.update', $firmware->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row g-3 flex-between-end mb-5">
            <div class="col-auto">
                <h2 class="mb-2">Edit Firmware</h2>
                <h5 class="text-body-tertiary fw-semibold">
                    Update the firmware details.
                </h5>
            </div>
            <div class="col-auto">
                <a href="{{ route('rollouts.index') }}" class="btn btn-phoenix-secondary me-2 mb-2 mb-sm-0">Discard</a>
                <button class="btn btn-primary mb-2 mb-sm-0" type="submit">Edit Firmware</button>
            </div>
        </div>

        <div class="mb-3">
            <label for="version">Firmware Version:</label>
            <input type="text" class="form-control" id="version" name="version" value="{{ $firmware->version }}"
                   required>
        </div>
        <div>
            <label for="firmware_file">Upload New Firmware (.bin file):</label>
            <input type="file" class="form-control" id="firmware_file" name="firmware_file">
        </div>


    </form>
@endsection
