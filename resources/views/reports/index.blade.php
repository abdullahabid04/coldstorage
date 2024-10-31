@extends('layouts.client')

@push('css')
    <style>
        .select2-selection__rendered .details {
            display: none !important;
        }

        .select2-container .select2-selection--single {
            font-family: "Nunito Sans", sans-serif;
            font-size: 13px;
            font-weight: 600;
            height: calc(2.1rem + 2px);
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            padding: 0.375rem 0.75rem;
            display: flex;
            align-items: center;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: calc(2.25rem + 2px);
            color: #495057;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 100%;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
        }

        .select2-container--default .select2-selection--single .select2-selection__placeholder {
            color: #6c757d;
        }
    </style>
@endpush


@section('content')
<div class="row gy-3 mb-6 justify-content-between align-items-center">
    <div class="col-md-4 col-12">
        <h2 class="mb-2 text-body-emphasis">Report Overview</h2>
        <h5 class="text-body-tertiary fw-semibold">Generate and download detailed reports.</h5>
    </div>

    <div class="col-md-8 col-12">
        <form action="" method="GET" class="row g-3 align-items-center">
            <div class="col">
                <select class="form-select" id="type" name="type">
                    <option value="store">Stores</option>
                    <option value="area">Areas</option>
                </select>
            </div>

            <div class="col">
                <select class="form-select" id="entity" name="entity" style="width: 100%;"></select>
            </div>

            <div class="col">
                <div class="flatpickr-input-container">
                    <input class="form-control datetimepicker flatpickr-input ps-6" id="timepicker2" type="text"
                        placeholder="Select Date Range"
                        data-options="{&quot;mode&quot;:&quot;range&quot;,&quot;dateFormat&quot;:&quot;d/m/y&quot;,&quot;disableMobile&quot;:true}"
                        readonly="readonly" name="time_range" required>
                    <span class="uil uil-calendar-alt flatpickr-icon text-body-tertiary"></span>
                </div>
            </div>
            <div class="col-md-2 col-12">
                <button class="btn btn-primary w-100 w-lg-auto" type="submit">Generate</button>
            </div>
        </form>
    </div>

    <hr class="mt-4">

    @if($data)
        <div id="reports" data-list='{"valueNames":["id", "timestamp", "avg_t", "avg_h"]}'>
            <div class="d-flex align-items-center justify-content-between mb-3">
                <h2 class="mb-2 text-body-emphasis">Generated Report</h2>
                <a href="{{ route('reports.download', [$entity, $startDate, $endDate]) }}">
                    <button class="btn btn-success">Download PDF</button>
                </a>
                <a href="{{ route('reports.view', [$type, $entity, $startDate, $endDate]) }}">
                    <button class="btn btn-success">View PDF</button>
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
                            @foreach($data as $idx => $d)
                                <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                                    <td class="id align-middle white-space-nowrap">{{ $idx + 1 }}</td>
                                    <td class="timestamp align-middle white-space-nowrap">{{ $d->timestamp }}</td>
                                    <td class="avg_t align-middle white-space-nowrap">{{ $d->average_temperature }}</td>
                                    <td class="avg_h align-middle white-space-nowrap">{{ $d->average_humidity }}</td>
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

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            $('#entity').select2({
                templateResult: formatOptionWithTags,
                templateSelection: formatOptionWithTags
            });

            const stores = @json($stores);
            const areas = @json($areas);

            function formatOptionWithTags(option) {
                if (!option.id) {
                    return option.text;
                }

                const tag = $(option.element).data('tag');
                const storeTitle = $(option.element).data('storeTitle');

                return $(
                    `<span>${option.text}
                                                                                    ${tag ? `<br><small>Tag: ${tag}</small>` : ''}
                                                                                    ${storeTitle ? `<br><small class="details">${storeTitle}</small>` : ''}</span>`
                );
            }

            function populateEntityDropdown(type) {
                const entitySelect = $('#entity');
                entitySelect.empty();

                const placeholderOption = new Option(`Select ${type === "store" ? "Store" : "Area"}`, "", true, false);
                entitySelect.append(placeholderOption);

                if (type === 'store') {
                    stores.forEach(store => {
                        const option = new Option(store.title, store.id, false, false);
                        $(option).data('tag', store.tag).data('storeTitle', '');
                        $(option).addClass('type-store');
                        entitySelect.append(option);
                    });
                } else if (type === 'area') {
                    areas.forEach(area => {
                        const option = new Option(area.title, area.id, false, false);
                        $(option).data('tag', area.tag).data('storeTitle', area.store.title);
                        $(option).addClass('type-area');
                        entitySelect.append(option);
                    });
                }

                entitySelect.val(null).trigger('change');
            }

            $('#type').on('change', function () {
                const selectedType = $(this).val();
                populateEntityDropdown(selectedType);
            });

            $('#type').trigger('change');
        });
    </script>

@endpush