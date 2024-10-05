@extends('layouts.app')

@section('content')
    <nav class="mb-3" aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('rollouts.index') }}">Device Groups</a></li>
            <li class="breadcrumb-item active">Add Device group</li>
        </ol>
    </nav>

    <form action="{{ route('device_groups.store') }}" method="POST">
        @csrf

        <div class="row g-3 flex-between-end mb-5">
            <div class="col-auto">
                <h2 class="mb-2">Create Rollout</h2>
                <h5 class="text-body-tertiary fw-semibold">
                    Add a new rollout.
                </h5>
            </div>
            <div class="col-auto">
                <a href="{{ route('device_groups.index') }}" class="btn btn-phoenix-secondary me-2 mb-2 mb-sm-0">Discard</a>
                <button class="btn btn-primary mb-2 mb-sm-0" type="submit">Create</button>
            </div>
        </div>

        <div class="mb-3">
            <label for="name">Group Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="form-floating form-floating-advance-select mb-3">
            <label for="floaTingLabelMultipleSelect">Devices</label>
            <select class="form-select" id="floaTingLabelMultipleSelect" name="devices[]" multiple data-choices
                    data-options='{"removeItemButton": true, "placeholder": true}'>
                @foreach($devices as $row)
                    <option value="{{ $row->id }}">{{ $row->serial_number }}</option>
                @endforeach
            </select>
        </div>
    </form>
@endsection
