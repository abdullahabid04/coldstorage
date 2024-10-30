@extends('layouts.powereye')

@section('content')
    <nav class="mb-3" aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/companies') }}">Companies</a></li>
            <li class="breadcrumb-item active">Company Details</li>
        </ol>
    </nav>

    <h2>{{ $company->name }}</h2>
    @if ($company->logo)
        <img src="{{ asset('storage/' . $company->logo) }}" alt="Logo" width="150">
    @endif

    <div class="mt-3">
        <a href="{{ route('companies.edit', $company) }}" class="btn btn-warning">Edit</a>
        <form action="{{ route('companies.destroy', $company) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        <a href="{{ route('companies.index') }}" class="btn btn-secondary">Back</a>
    </div>
@endsection
