@extends('layouts.client')

@section('content')
    <div class="row gy-3 mb-6 justify-content-between align-items-center">
        <div class="col-md-4 col-12">
            <h2 class="mb-2 text-body-emphasis">Report Overview</h2>
            <h5 class="text-body-tertiary fw-semibold">Generate and download detailed reports.</h5>
        </div>
        <div class="col-md-8 col-12">
            <form action="" class="row g-3 align-items-center">
                <div class="col-md-5 col-12">
                    <select class="form-select"
                            id="storeSelect"
                            name="area"
                            data-choices="data-choices"
                            data-options='{"removeItemButton":true,"placeholder":true}'>
                        <option value="">Select an Area</option>
                        @foreach($stores as $store)
                            @foreach($store->areas as $area)
                                <option value="{{ $area->id }}">{{ $area->title }} - {{ $store->title }}</option>
                            @endforeach
                        @endforeach
                    </select>
                </div>
                <div class="col-md-5 col-12">
                    <div class="flatpickr-input-container">
                        <input class="form-control datetimepicker flatpickr-input ps-6" id="timepicker2" type="text"
                               placeholder="Select Date Range"
                               data-options="{&quot;mode&quot;:&quot;range&quot;,&quot;dateFormat&quot;:&quot;d/m/y&quot;,&quot;disableMobile&quot;:true}"
                               readonly="readonly"
                               name="time_range">
                        <span class="uil uil-calendar-alt flatpickr-icon text-body-tertiary"></span>
                    </div>
                </div>
                <div class="col-md-2 col-12">
                    <button class="btn btn-primary w-100 w-lg-auto" type="submit">Generate</button>
                </div>
            </form>
        </div>

        <hr class="mt-4">

        @if($reportData)
            <div id="reports"
                 data-list='{"valueNames":["id", "timestamp", "avg_t", "avg_h"],"page":10,"pagination":true}'>
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h2 class="mb-2 text-body-emphasis">Generated Report</h2>
                    <a href="{{ route('reports.download', [$areaId, $startDate, $endDate]) }}">
                        <button class="btn btn-success">Download PDF</button>
                    </a>
                </div>

                <div class="mx-n4 mx-lg-n6 px-4 px-lg-6 mb-9 bg-body-emphasis border-y mt-2 position-relative top-1">
                    <div class="table-responsive scrollbar ms-n1 ps-1">
                        <table class="table table-sm fs-9 mb-0">
                            <thead>
                            <tr>
                                <th class="sort align-middle" scope="col" data-sort="id"
                                    style="width:10%; min-width:200px;">#
                                </th>
                                <th class="sort align-middle" scope="col" data-sort="timestamp"
                                    style="width:30%; min-width:200px;">Timestamp
                                </th>
                                <th class="sort align-middle" scope="col" data-sort="avg_t"
                                    style="width:30%; min-width:200px;">Avg. Temperature (°C)
                                </th>
                                <th class="sort align-middle" scope="col" data-sort="avg_h"
                                    style="width:30%; min-width:200px;">Avg. Humidity (%)
                                </th>
                            </tr>
                            </thead>
                            <tbody class="list">
                            @foreach($reportData as $idx => $data)
                                <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                                    <td class="id align-middle white-space-nowrap">{{ $idx + 1 }}</td>
                                    <td class="timestamp align-middle white-space-nowrap">{{ $data->timestamp }}</td>
                                    <td class="avg_t align-middle white-space-nowrap">{{ $data->average_temperature }}</td>
                                    <td class="avg_h align-middle white-space-nowrap">{{ $data->average_humidity }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection

@push('css')
    <style>
        .choices__inner {
            font-size: 14px !important;
            padding: 0.5rem !important;
        }

        .choices__item:not(:first-child) {
            font-size: 14px !important;
            padding: 8px 12px !important;
            color: #333 !important;
            background-color: #fff !important;
            border-bottom: 1px solid #ddd !important;
        }

        .choices__item--selectable.is-highlighted {
            background-color: #007bff !important;
            color: #fff !important;
        }

    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const storeSelect = document.getElementById('storeSelect');
            const storeChoices = new Choices(storeSelect, {
                removeItemButton: true,
                placeholder: true
            });
        });
    </script>
@endpush
