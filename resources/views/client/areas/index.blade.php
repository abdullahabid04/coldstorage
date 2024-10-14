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
            List of Areas in your Stores
        </p>
    </div>

    <div id="sites" data-list='{"valueNames":["title","store","address"],"page":10,"pagination":true}'>
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
        </div>

        <div class="mx-n4 mx-lg-n6 px-4 px-lg-6 mb-9 bg-body-emphasis border-y mt-2 position-relative top-1">
            <div class="table-responsive scrollbar ms-n1 ps-1">
                <table class="table table-sm fs-9 mb-0">
                    <thead>
                    <tr>
                        <th class="sort align-middle" scope="col" data-sort="title" style="width:20%; min-width:200px;">
                            AREA TITLE
                        </th>
                        <th class="sort align-middle" scope="col" data-sort="store"
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
                                        <a class="dropdown-item" href="#"
                                           data-id="{{ $area->id }}"
                                           data-title="{{ $area->title }}"
                                           onclick="openRenameModal(this)">
                                            Rename
                                        </a>
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

    <!-- Rename Area Modal -->
    <div class="modal fade" id="renameAreaModal" tabindex="-1" aria-labelledby="renameAreaModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="renameAreaModalLabel">Rename Area</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="renameAreaForm">
                        @csrf
                        <div class="mb-3">
                            <label for="areaTitle" class="form-label">Area Title</label>
                            <input type="text" class="form-control" id="areaTitle" name="title" required>
                        </div>
                        <input type="hidden" id="areaId">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Rename</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function openRenameModal(element) {
            const areaId = element.getAttribute('data-id');
            const areaTitle = element.getAttribute('data-title');
            document.getElementById('areaId').value = areaId;
            document.getElementById('areaTitle').value = areaTitle;
            const renameModal = new bootstrap.Modal(document.getElementById('renameAreaModal'));
            renameModal.show();
        }

        document.getElementById('renameAreaForm').addEventListener('submit', function (event) {
            event.preventDefault();
            const areaId = document.getElementById('areaId').value;
            const areaTitle = document.getElementById('areaTitle').value;

            console.log(areaId, areaTitle);

            fetch(`/api/areas/${areaId}/rename`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    title: areaTitle
                })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        window.location.reload(); // Reload the page to show the updated title
                    } else {
                        alert('Error renaming area');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    </script>
@endpush
