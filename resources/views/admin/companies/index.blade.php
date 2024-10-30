@extends('layouts.powereye')

@section('content')
    <nav class="mb-3" aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item active">Companies</li>
        </ol>
    </nav>

    <div class="mb-3">
        <a href="{{ route('companies.create') }}" class="btn btn-primary">Add Company</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Logo</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($companies as $company)
            <tr>
                <td>{{ $company->id }}</td>
                <td>{{ $company->name }}</td>
                <td><img src="{{ asset('storage/' . $company->logo) }}" alt="Logo" width="50"></td>
                <td>
                    <a href="{{ route('companies.edit', $company) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('companies.destroy', $company) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
