@extends('layouts.app')

@section('content')
    <nav class="mb-3" aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item active">Firmware Updates</li>
        </ol>
    </nav>

    <div class="mb-5">
        <h2 class="text-bold text-body-emphasis">Firmware Updates</h2>

        <p class="text-body-tertiary lead">
            Manage firmware updates.
        </p>
    </div>

    <div id="firmwares" data-list='{"valueNames":["id", "group", "device_count"],"page":10,"pagination":true}'>
        <div class="row align-items-center justify-content-between g-3 mb-4">
            <div class="col col-auto">
                <div class="search-box">
                    <form class="position-relative">
                        <input class="form-control search-input search" type="search" placeholder="Search firmware updates"
                               aria-label="Search"/>
                        <span class="fas fa-search search-box-icon"></span>
                    </form>
                </div>
            </div>

            <div class="col-auto">
                <div class="d-flex align-items-center">
                    <a class="btn btn-primary" href="{{ route('firmware_updates.create') }}">
                        <span class="fas fa-plus me-2"></span>
                        Add Firmware Update
                    </a>
                </div>
            </div>
        </div>
        <div class="mx-n4 mx-lg-n6 px-4 px-lg-6 mb-9 bg-body-emphasis border-y mt-2 position-relative top-1">
            <div class="table-responsive scrollbar ms-n1 ps-1">
                <table class="table table-sm fs-9 mb-0">
                    <thead>
                    <tr>
                        <th class="sort align-middle" scope="col" data-sort="id" style="width:10%; min-width:100px;">
                            Serial No
                        </th>
                        <th class="sort align-middle" scope="col" data-sort="group"
                            style="width:15%; min-width:100px;">
                            Name
                        </th>
                        <th class="align-middle" scope="col" data-sort="device_count"
                            style="width:15%; min-width:100px;">
                            Firmware Version
                        </th>
                        <th class="align-middle" scope="col" data-sort="device_count"
                            style="width:20%; min-width:100px;">
                            Compatible Models
                        </th>
                        <th class="align-middle" scope="col" data-sort="device_count"
                            style="width:15%; min-width:100px;">
                            Min Version
                        </th>
                        <th class="align-middle" scope="col" data-sort="device_count"
                            style="width:15%; min-width:100px;">
                            Max Version
                        </th>
                        <th class="align-middle" scope="col" data-sort="device_count"
                            style="width:20%; min-width:100px;">
                            Status
                        </th>
                        <th class="align-middle text-end" style="width:10%; min-width:100px;">
                        </th>
                    </tr>
                    </thead>
                    <tbody class="list" id="firmwares-table-body">
                    @php $counter = 0 @endphp
                    @foreach($firmwareUpdates as $update)
                        <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                            <td class="id align-middle white-space-nowrap">
                                @php $counter = $counter + 1 @endphp
                                <h6 class="mb-0 fw-semibold">{{ $counter }}</h6>
                            </td>
                            <td class="group align-middle white-space-nowrap">
                                {{ $update->name }}
                            </td>
                            <td class="device_count align-middle white-space-nowrap">
                                {{ $update->firmware->version }}
                            </td>
                            <td class="device_count align-middle white-space-nowrap">
                                {{ implode(', ', json_decode($update->compatible_models, true)) }}
                            </td>
                            <td class="device_count align-middle white-space-nowrap">
                                {{ $update->min_version }}
                            </td>
                            <td class="device_count align-middle white-space-nowrap">
                                {{ $update->max_version }}
                            </td>
                            <td class="device_count align-middle white-space-nowrap">
                                {{ ucfirst($update->status) }}
                            </td>
                            <td class="actions align-middle text-end white-space-nowrap text-body-tertiary">
                                <div class="btn-reveal-trigger position-static">
                                    <button
                                        class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs-10"
                                        type="button" data-bs-toggle="dropdown" data-boundary="window"
                                        aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">
                                        <svg class="svg-inline--fa fa-ellipsis fs-10" aria-hidden="true"
                                             focusable="false" data-prefix="fas" data-icon="ellipsis" role="img"
                                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                            <path fill="currentColor"
                                                  d="M8 256a56 56 0 1 1 112 0A56 56 0 1 1 8 256zm160 0a56 56 0 1 1 112 0 56 56 0 1 1 -112 0zm216-56a56 56 0 1 1 0 112 56 56 0 1 1 0-112z">
                                            </path>
                                        </svg>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end py-2">
                                        <a class="dropdown-item" href="{{ route('firmware_updates.edit', $update) }}">
                                            Edit
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <form action="{{ route('firmware_updates.destroy', $update) }}" method="POST"
                                              style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="dropdown-item text-danger" type="submit">Remove</button>
                                        </form>
                                    </div>
                                </div>
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
@endsection


