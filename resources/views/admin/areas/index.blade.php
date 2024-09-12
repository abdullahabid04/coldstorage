@extends('layouts.powereye')

@section('content')
    <nav class="mb-3" aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item active">Areas</li>
        </ol>
    </nav>

    <div class="mb-5">
        <h2 class="text-bold text-body-emphasis">Areas</h2>
        <p class="text-body-tertiary lead">
            Manage sites in factories.
        </p>
    </div>

    <div id="sites" data-list='{"valueNames":["title","factory","address"],"page":10,"pagination":true}'>
        <div class="row align-items-center justify-content-between g-3 mb-4">
            <div class="col col-auto">
                <div class="search-box">
                    <form class="position-relative">
                        <input class="form-control search-input search" type="search" placeholder="Search users"
                               aria-label="Search"/>
                        <span class="fas fa-search search-box-icon"></span>
                    </form>
                </div>
            </div>

            <div class="col-auto">
                <div class="d-flex align-items-center">
                    <a class="btn btn-primary" href="{{ route('areas.create') }}">
                        <span class="fas fa-plus me-2"></span>
                        Add Area
                    </a>
                </div>
            </div>
        </div>
        <div class="mx-n4 mx-lg-n6 px-4 px-lg-6 mb-9 bg-body-emphasis border-y mt-2 position-relative top-1">
            <div class="table-responsive scrollbar ms-n1 ps-1">
                <table class="table table-sm fs-9 mb-0">
                    <thead>
                    <tr>
                        <th class="sort align-middle" scope="col" data-sort="title" style="width:20%; min-width:200px;">
                            AREA TITLE
                        </th>
                        <th class="sort align-middle" scope="col" data-sort="factory"
                            style="width:20%; min-width:200px;">
                            STORE NAME
                        </th>
                        <th class="sort align-middle pe-3" scope="col" data-sort="address"
                            style="width:20%; min-width:200px;">
                            STORE ADDRESS
                        </th>
                        <th class="sort align-middle text-end" scope="col" style="width:21%; min-width:200px;">
                            ACTIONS
                        </th>
                    </tr>
                    </thead>
                    <tbody class="list" id="sites-table-body">
                    @foreach($areas as $area)
                        <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                            <td class="customer align-middle white-space-nowrap">
                                <a class="d-flex align-items-center text-body text-hover-1000 ps-2" href="#">
                                    <h6 class="mb-0 ms-3 fw-semibold">{{ $area->title }}</h6>
                                </a>
                            </td>
                            <td class="factory align-middle white-space-nowrap">
                                {{ $area->store->title }}
                            </td>
                            <td class="email align-middle white-space-nowrap">
                                {{ $area->store->address }}
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
                                        <a class="dropdown-item" href="{{ route('areas.edit', $area) }}">
                                            Edit
                                        </a>

                                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#linkDeviceModal" data-area-id="{{ $area->id }}">
                                            Link Devices
                                        </a>

                                        <div class="dropdown-divider"></div>

                                        <form action="{{ route('areas.destroy', $area) }}" method="POST" style="display:inline;">
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

    <!-- Link Device Modal -->
    <div class="modal fade" id="linkDeviceModal" tabindex="-1" aria-labelledby="linkDeviceModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="linkDeviceModalLabel">Link Devices to Store</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="linkDeviceForm">
                        @csrf
                        <input type="hidden" name="area_id" id="area_id">

                        <div class="form-floating form-floating-advance-select">
                            <label for="floaTingLabelSelect">Device</label>
                            <select class="form-select" id="floaTingLabelSelect" name="device_id" data-choices data-options='{"placeholder": true}'>
                                <option value="">Select a device</option>
                                @foreach($devices as $row)
                                    <option value="{{ $row->id }}">{{ $row->serial_number }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Link Devices</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var linkDeviceModal = document.getElementById('linkDeviceModal');
            if (linkDeviceModal) {
                linkDeviceModal.addEventListener('show.bs.modal', function (event) {
                    var button = event.relatedTarget;
                    var areaId = button.getAttribute('data-area-id');
                    var modalBodyInput = linkDeviceModal.querySelector('#area_id');
                    if (modalBodyInput) {
                        modalBodyInput.value = areaId;
                    }
                });

                var linkDeviceForm = document.getElementById('linkDeviceForm');
                if (linkDeviceForm) {
                    linkDeviceForm.addEventListener('submit', function (e) {
                        e.preventDefault();
                        let formData = new FormData(this);

                        fetch("{{ route('api.store-devices.store') }}", {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Accept': 'application/json'
                            }
                        })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    alert('Devices linked successfully!');
                                    location.reload();
                                } else {
                                    alert('Error linking devices: ' + data.message);
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                alert('An error occurred while linking the devices.');
                            });
                    });
                }
            }
        });
    </script>
@endpush
