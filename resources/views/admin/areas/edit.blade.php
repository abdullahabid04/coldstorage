@extends('layouts.powereye')

@section('content')
    <nav class="mb-3" aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/areas') }}">Areas</a></li>
            <li class="breadcrumb-item active">Edit Area</li>
        </ol>
    </nav>

    <form class="mb-9" method="POST" action="{{ route('areas.update', $area->id) }}">
        @csrf
        @method('PUT')
        <div class="row g-3 flex-between-end mb-5">
            <div class="col-auto">
                <h2 class="mb-2">Edit Area</h2>
                <h5 class="text-body-tertiary fw-semibold">
                    Update the area information for your stores.
                </h5>
            </div>
            <div class="col-auto">
                <button class="btn btn-phoenix-secondary me-2 mb-2 mb-sm-0" type="reset">Discard</button>
                <button class="btn btn-primary mb-2 mb-sm-0" type="submit">Update Area</button>
            </div>
        </div>

        <div class="row g-5">
            <div class="col-12 col-xl-8">
                <div class="mb-5">
                    <h5>Site Title</h5>
                    <input class="form-control" type="text" id="title" name="title" placeholder="Site Title"
                           value="{{ old('title', $area->title) }}" required>
                </div>

                <div class="mb-5">
                    <h5>Store</h5>
                    <select class="form-control" id="store_id" name="store_id" required>
                        @foreach($stores as $store)
                            <option value="{{ $store->id }}" {{ $area->store_id == $store->id ? 'selected' : '' }}>
                                {{ $store->title }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </form>
@endsection
