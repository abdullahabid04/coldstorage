@extends('layouts.client')

@section('content')
    <div class="row gy-3 mb-6 justify-content-between align-items-center">
        <div class="col-md-4 col-auto">
            <h2 class="mb-2 text-body-emphasis">Report</h2>
            <h5 class="text-body-tertiary fw-semibold">Lorem ipsum dolor sit amet.</h5>
        </div>
        <div class="col-md-8 col-auto">
            <form action="" class="row g-3 align-items-center">
                <div class="col-5">
                    <select class="form-select"
                            id="storeSelect"
                            name="area"
                            data-choices="data-choices"
                            data-options='{"removeItemButton":true,"placeholder":true}'>
                        <option value="">Select Area...</option>
                        @foreach($stores as $store)
                            @foreach($store->areas as $area)
                                <option value="{{ $area->id }}">{{ $area->title }} - {{ $store->title }}</option>
                            @endforeach
                        @endforeach
                    </select>
                </div>
                <div class="col-5">
                    <div class="flatpickr-input-container">
                        <input class="form-control datetimepicker flatpickr-input ps-6" id="timepicker2" type="text"
                               placeholder="d/m/y to d/m/y"
                               data-options="{&quot;mode&quot;:&quot;range&quot;,&quot;dateFormat&quot;:&quot;d/m/y&quot;,&quot;disableMobile&quot;:true}"
                               readonly="readonly"
                               name="time_range">
                        <span class="uil uil-calendar-alt flatpickr-icon text-body-tertiary"></span>
                    </div>
                </div>
                <div class="col-2">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </form>
        </div>
        <hr>
        @if($reportData)
            <div>
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h2 class="mb-2 text-body-emphasis">Report</h2>
                    <a href="{{route('reports.download', [$areaId, $startDate, $endDate])}}">
                        <button class="btn btn-success">Download</button>
                    </a>
                </div>

                <div class="mx-n4 mx-lg-n6 px-4 px-lg-6 mb-9 bg-body-emphasis border-y mt-2 position-relative top-1">
                    <div class="table-responsive scrollbar ms-n1 ps-1">
                        <table class="table table-sm fs-9 mb-0">
                            <thead>
                            <tr>
                                <th class="sort align-middle" scope="col">
                                    #
                                </th>
                                <th class="sort align-middle" scope="col">
                                    Timestamp
                                </th>
                                <th class="sort align-middle" scope="col">
                                    Average Temperature (°C)
                                </th>
                                <th class="sort align-middle" scope="col">
                                    Average Humidity (%)
                                </th>
                            </tr>
                            </thead>
                            <tbody class="list">
                            @foreach($reportData as $idx => $data)
                                <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                                    <td class="align-middle white-space-nowrap">
                                        {{ $idx + 1 }}
                                    </td>
                                    <td class="align-middle white-space-nowrap">
                                        {{ $data->timestamp }}
                                    </td>
                                    <td class="align-middle white-space-nowrap">
                                        {{ $data->average_temperature }}
                                    </td>
                                    <td class="align-middle white-space-nowrap">
                                        {{ $data->average_humidity }}
                                    </td>
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
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const storeSelect = document.getElementById('storeSelect');

            // Initialize Choices.js for the store select
            const storeChoices = new Choices(storeSelect, {
                removeItemButton: true,
                placeholder: true
            });

            // If you want to add additional functionality when store changes, you can do that here
            storeSelect.addEventListener('change', function (event) {
                // You can perform any action when a store is selected
                console.log('Store selected:', storeSelect.value);
            });
        });
    </script>
@endpush
