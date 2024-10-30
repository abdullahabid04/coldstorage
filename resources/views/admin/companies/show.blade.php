@extends('layouts.powereye')

@section('content')
    <nav class="mb-3" aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/companies') }}">Companies</a></li>
            <li class="breadcrumb-item active">{{ $company->name }}</li>
        </ol>
    </nav>

    <div class="row g-3 flex-between-end mb-5">
        <div class="col-auto">
            <h2 class="mb-2">{{ $company->name }}</h2>
            <h5 class="text-body-tertiary fw-semibold">
                Company details.
            </h5>
        </div>

        <div class="col-auto">
            <a href="{{ url('/companies') }}" class="btn btn-primary mb-2 mb-sm-0">Back</a>
        </div>
    </div>

    <div class="row g-5">
        <div class="col-12 col-xl-8">
            <div class="mb-5">
                <h5>Company Logo</h5>
                @php
                    $src = $company->logo ? Storage::url($company->logo) : asset('images/default-logo.png');
                @endphp
                <div class="avatar avatar-m">
                    <img class="rounded-circle" src="{{ $src }}" alt="Company Logo"
                         style="width: 100px; height: 100px;">
                </div>
            </div>
        </div>
    </div>
@endsection
