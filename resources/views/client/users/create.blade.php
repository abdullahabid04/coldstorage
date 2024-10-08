@extends('layouts.powereye')

@section('content')
    <nav class="mb-3" aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/client/store-clients') }}">Users</a></li>
            <li class="breadcrumb-item active">Add User</li>
        </ol>
    </nav>

    <form class="mb-9" method="POST" action="{{ route('client.store-clients.store') }}" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="row g-3 flex-between-end mb-5">
            <div class="col-auto">
                <h2 class="mb-2">Add a user</h2>
                <h5 class="text-body-tertiary fw-semibold">
                    Add a system user for allowing your employees or clients to utilize the system.
                </h5>
            </div>
            <div class="col-auto">
                <a href="{{ route('client.store-clients.index') }}" class="btn btn-phoenix-secondary me-2 mb-2 mb-sm-0">Discard</a>
                <button class="btn btn-primary mb-2 mb-sm-0" type="submit">Add user</button>
            </div>
        </div>

        <div class="row g-5">
            <div class="col-12 col-xl-8">
                <div class="mb-5">
                    <h5>User Name</h5>
                    <input class="form-control" type="text" name="name" placeholder="User Name"
                           value="{{ old('name') }}" required>
                    @if($errors->has('name'))
                    <div class="text-danger small">
                        {{ $errors->first('name') }}
                    </div>
                    @endif
                </div>
                <div class="mb-5">
                    <h5>User Image</h5>
                    <input type="file" class="form-control" id="photo_path" name="photo_path" accept="image/*">
                    @if($errors->has('photo_path'))
                        <div class="text-danger small">
                            {{ $errors->first('photo_path') }}
                        </div>
                    @endif
                </div>

                <div class="mb-5">
                    <h5>Email</h5>
                    <input class="form-control" type="email" name="email" placeholder="User Email"
                           value="{{ old('email') }}" required>
                    @if($errors->has('email'))
                        <div class="text-danger small">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>

                <div class="mb-5">
                    <h5>Password</h5>
                    <input class="form-control" type="password" name="password" placeholder="Password"
                           value="{{ old('password') }}" required>
                    @if($errors->has('password'))
                        <div class="text-danger small">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                </div>

                <div class="mb-5">
                    <h5>Confirm Password</h5>
                    <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm Password"
                           value="{{ old('password_confirmation') }}" required>
                </div>
            </div>

            <div class="col-12 col-xl-4">
                <div class="row g-2">
                    <div class="col-12 col-xl-12">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Organize</h4>
                                <div class="row gx-3">
                                    <div class="form-floating form-floating-advance-select">
                                        <label for="floaTingLabelMultipleSelect">Devices</label>
                                        <select class="form-select" id="floaTingLabelMultipleSelect" name="device_ids[]" multiple data-choices data-options='{"removeItemButton": true, "placeholder": true}'>
                                            @foreach($devices as $row)
                                                <option value="{{ $row->id }}">{{ $row->area->first()->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('scripts')

@endpush
