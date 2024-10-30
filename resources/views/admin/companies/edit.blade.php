@extends('layouts.powereye')

@section('content')
    <nav class="mb-3" aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/companies') }}">Companies</a></li>
            <li class="breadcrumb-item active">Edit Company</li>
        </ol>
    </nav>

    <form class="mb-9" method="POST" action="{{ route('companies.update', $company->id) }}"
          enctype="multipart/form-data">
        @csrf
        @method('PUT')  <!-- Use PUT method for updating -->

        <div class="row g-3 flex-between-end mb-5">
            <div class="col-auto">
                <h2 class="mb-2">Edit a company</h2>
                <h5 class="text-body-tertiary fw-semibold">
                    Edit the company details for your clients.
                </h5>
            </div>

            <div class="col-auto">
                <button class="btn btn-phoenix-secondary me-2 mb-2 mb-sm-0" type="reset">Discard</button>
                <button class="btn btn-primary mb-2 mb-sm-0" type="submit">Update Company</button>
            </div>
        </div>

        <div class="row g-5">
            <div class="col-12 col-xl-8">
                <div class="mb-5">
                    <h5>Store Title</h5>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Company Name"
                           value="{{ old('name', $company->name) }}" required>
                </div>

                <div class="mb-5">
                    <h5>Store Logo</h5>
                    <input type="file" class="form-control" name="logo" id="logo" accept="image/*">
                    @if ($company->logo)
                        <div class="d-flex align-items-center mt-2">  <!-- Use flex utilities -->
                            <img src="{{ Storage::url($company->logo) }}" alt="Current Logo" class="img-fluid"
                                 style="max-width: 100px; margin-right: 15px;">  <!-- Adjusted size and added margin -->
                            <p class="text-body-tertiary mb-0">
                                This is the current logo. Leave the logo field empty to keep this or select a new one to
                                update.
                            </p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </form>
@endsection
