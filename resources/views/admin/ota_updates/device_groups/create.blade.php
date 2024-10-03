@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create Device Group</h2>
        <form action="{{ route('device_groups.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Group Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-floating form-floating-advance-select">
                <label for="floaTingLabelMultipleSelect">Devices</label>
                <select class="form-select" id="floaTingLabelMultipleSelect" name="devices[]" multiple data-choices data-options='{"removeItemButton": true, "placeholder": true}'>
                    @foreach($devices as $row)
                        <option value="{{ $row->id }}">{{ $row->serial_number }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
