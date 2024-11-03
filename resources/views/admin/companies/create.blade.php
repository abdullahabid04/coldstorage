@extends('layouts.powereye')

@section('content')
    <nav class="mb-3" aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/companies') }}">Companies</a></li>
            <li class="breadcrumb-item active">Add Company</li>
        </ol>
    </nav>

    <form class="mb-9" method="POST" action="{{ route('companies.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row g-3 flex-between-end mb-5">
            <div class="col-auto">
                <h2 class="mb-2">Add a company</h2>
                <h5 class="text-body-tertiary fw-semibold">
                    Add a company for your clients.
                </h5>
            </div>

            <div class="col-auto">
                <button class="btn btn-phoenix-secondary me-2 mb-2 mb-sm-0" type="reset">Discard</button>
                <button class="btn btn-primary mb-2 mb-sm-0" type="submit">Add Company</button>
            </div>
        </div>

        <div class="row g-5">
            <div class="col-12 col-xl-8">
                <div class="mb-5">
                    <h5>Store Title</h5>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Company Name" required>
                </div>

                <div class="mb-5">
                    <h5>Store Address</h5>
                    <input type="file" class="form-control" name="logo" id="logo" accept="image/*">
                </div>
            </div>
        </div>
    </form>
@endsection
