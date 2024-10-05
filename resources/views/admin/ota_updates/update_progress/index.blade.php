@extends('layouts.app')

@section('content')
    <nav class="mb-3" aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item active">Update Progress</li>
        </ol>
    </nav>

    <div class="mb-5">
        <h2 class="text-bold text-body-emphasis">Firmware Update Progress</h2>
    </div>

    <div id="logs"
         data-list='{"valueNames":["id", "device", "firmware_version", "progress", "status"],"page":10,"pagination":true}'>
        <div class="row align-items-center justify-content-between g-3 mb-4">
            <div class="col col-auto">
                <div class="search-box">
                    <form class="position-relative">
                        <input class="form-control search-input search" type="search" placeholder="Search update progress"
                               aria-label="Search"/>
                        <span class="fas fa-search search-box-icon"></span>
                    </form>
                </div>
            </div>
        </div>

        <div class="mx-n4 mx-lg-n6 px-4 px-lg-6 mb-9 bg-body-emphasis border-y mt-2 position-relative top-1">
            <div class="table-responsive scrollbar ms-n1 ps-1 mt-3">
                <table class="table table-sm fs-9">
                    <thead>
                    <tr>
                        <th class="sort align-middle" scope="col" data-sort="id" style="width: 10%">
                            Id
                        </th>
                        <th class="sort align-middle text-center" scope="col" data-sort="device" style="width: 25%"
                        >Device
                        </th>
                        <th class="sort align-middle text-center" scope="col" data-sort="firmware_version" style="width: 25%"
                        >Firmware Version
                        </th>
                        <th class="sort align-middle text-center" scope="col" data-sort="progress" style="width: 25%"
                        >Progress
                        </th>
                        <th class="sort align-middle text-end" scope="col" data-sort="status" style="width: 15%">Status</th>
                    </tr>
                    </thead>
                    <tbody class="list">
                    @foreach ($progresses as $progress)
                        <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                            <td class="align-middle ps-3 id">
                                <h6 class="fw-semibold">{{ $progress->id }}</h6>
                            </td>
                            <td class="align-middle device">
                                <h6 class="fw-semibold">{{ $progress->device->serial_number }}</h6>
                            </td>
                            <td class="align-middle firmware_version">
                                <h6 class="fw-semibold">{{ $progress->firmwareUpdate->firmware->version ?? 'N / A' }}</h6>
                            </td>
                            <td class="align-middle progress">
                                <h6 class="fw-semibold">{{ $progress->progress }}</h6>
                            </td>
                            <td class="align-middle status">
                                <h6 class="fw-semibold">{{ $progress->status }}</h6>
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
