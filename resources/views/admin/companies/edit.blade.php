@extends('layouts.powereye')

@section('content')
    <nav class="mb-3" aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/companies') }}">Companies</a></li>
            <li class="breadcrumb-item active">Edit Company</li>
        </ol>
    </nav>

    <form method="POST" action="{{ route('companies.update', $company) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-5">
            <h2>Edit Company</h2>
            <h5>Update the details below:</h5>
        </div>

        <div class="mb-5">
            <label for="name" class="form-label">Company Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Company Name"
                   value="{{ $company->name }}" required>
        </div>

        <div class="mb-5">
            <label for="logo" class="form-label">Logo</label>
            <input type="file" class="form-control" name="logo" id="logo" accept="image/*">
            <small class="form-text text-muted">Leave blank to keep the current logo.</small>
            @if ($company->logo)
                <img src="{{ asset('storage/' . $company->logo) }}" alt="Current Logo" width="50" class="mt-2">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update Company</button>
        <a href="{{ route('companies.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
