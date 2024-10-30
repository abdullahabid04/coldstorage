@extends('layouts.powereye')

@section('content')
    <nav class="mb-3" aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/companies') }}">Companies</a></li>
            <li class="breadcrumb-item active">Add Company</li>
        </ol>
    </nav>

    <form method="POST" action="{{ route('companies.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-5">
            <h2>Add Company</h2>
            <h5>Fill in the details below:</h5>
        </div>

        <div class="mb-5">
            <label for="name" class="form-label">Company Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Company Name" required>
        </div>

        <div class="mb-5">
            <label for="logo" class="form-label">Logo</label>
            <input type="file" class="form-control" name="logo" id="logo" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">Create Company</button>
        <a href="{{ route('companies.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
