@extends('layouts.app')

@section('content')
<nav class="mb-3" aria-label="breadcrumb">
    <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
        <li class="breadcrumb-item active">Clients</li>
    </ol>
</nav>

<div class="mb-5">
    <h2 class="text-bold text-body-emphasis">Clients</h2>
    <p class="text-body-tertiary lead">
        Manage clients.
    </p>
</div>

<div id="clients" data-list='{"valueNames":["name", "email", "num-stores"],"page":10,"pagination":true}'>
    <div class="row align-items-center justify-content-between g-3 mb-4">
        <div class="col col-auto">
            <div class="search-box">
                <form class="position-relative">
                    <input class="form-control search-input search" type="search" placeholder="Search clients"
                        aria-label="Search" />
                    <span class="fas fa-search search-box-icon"></span>
                </form>
            </div>
        </div>

        {{--
        <div class="col-auto">
            <div class="d-flex align-items-center">
                <a class="btn btn-primary" href="{{ route('areas.create') }}">
                    <span class="fas fa-plus me-2"></span>
                    Add Area
                </a>
            </div>
        </div>
        --}}
    </div>
    <div class="mx-n4 mx-lg-n6 px-4 px-lg-6 mb-9 bg-body-emphasis border-y mt-2 position-relative top-1">
        <div class="table-responsive scrollbar ms-n1 ps-1">
            <table class="table table-sm fs-9 mb-0">
                <thead>
                    <tr>
                        <th class="sort align-middle" scope="col" data-sort="name">
                            Name
                        </th>
                        <th class="sort align-middle" scope="col" data-sort="email">
                            Email
                        </th>
                        <th class="sort align-middle" scope="col" data-sort="num-stores">
                            Number of Stores
                        </th>
                        <th class="align-middle" scope="col">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="list">
                    @foreach($clients as $client)
                        <tr>
                            <td>{{ $client->name }}</td>
                            <td>{{ $client->email }}</td>
                            <td>{{ $client->stores->count() }}</td>
                            <td>
                                <button class="btn btn-info btn-sm toggle-details">Expand</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="row align-items-center justify-content-between py-2 pe-0 fs-9">
            <div class="col-auto d-flex">
                <p class="mb-0 d-none d-sm-block me-3 fw-semibold text-body" data-list-info="data-list-info"></p>
                <a class="fw-semibold" href="#!" data-list-view="*">
                    View all
                    <span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span>
                </a>
                <a class="fw-semibold d-none" href="#!" data-list-view="less">
                    View Less
                    <span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span>
                </a>
            </div>
            <div class="col-auto d-flex">
                <button class="page-link" data-list-pagination="prev">
                    <span class="fas fa-chevron-left"></span>
                </button>
                <ul class="mb-0 pagination"></ul>
                <button class="page-link pe-0" data-list-pagination="next">
                    <span class="fas fa-chevron-right"></span>
                </button>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5">
    <h2>Expandable Table Example</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clients as $client)
                <tr class="main-row" data-id="{{ $client->id }}">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->email }}</td>
                    <td>
                        <button class="btn btn-info btn-sm toggle-details">Expand</button>
                    </td>
                </tr>
                <tr class="details-row d-none" id="details-{{ $client->id }}">
                    <td colspan="4">
                        <strong>Address:</strong> {{ $client->address }} <br>
                        <strong>Phone:</strong> {{ $client->phone }} <br>
                        <strong>More Info:</strong> {{ $client->more_info }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toggleButtons = document.querySelectorAll('.toggle-details');

            toggleButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const mainRow = this.closest('.main-row');
                    const detailsRow = document.getElementById('details-' + mainRow.dataset.id);

                    if (detailsRow.classList.contains('d-none')) {
                        detailsRow.classList.remove('d-none');
                        this.textContent = "Collapse";
                    } else {
                        detailsRow.classList.add('d-none');
                        this.textContent = "Expand";
                    }
                });
            });
        });
        </sc
        ript >
@endpush