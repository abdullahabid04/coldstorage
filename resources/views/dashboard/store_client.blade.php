@extends('layouts.client')

@section('content')
<div class="pb-5">
    @forelse($stores as $store)
        <div class="row mb-4 pb-4 border-bottom store">
            <div class="col-12">
                <div class="mb-4">
                    <h2 class="mb-2">{{ $store->title }}</h2>
                    <h5 class="text-body-tertiary fw-semibold">{{ $store->address }}</h5>
                </div>
                <div class="col-12">
                    <div class="row store">
                        @forelse($store->areas as $area)
                            <div class="mb-3 col-12 col-lg-6 col-xxl-4">
                                <div class="card h-100 border m-0 p-0">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h5 class="mb-1">
                                                <a href="{{ route('areas.show', $area->id) }}"
                                                    class="text-decoration-none text-dark">{{ $area->title }}</a>
                                            </h5>
                                        </div>

                                        <div>
                                            <div class="d-md-flex justify-content-between align-items-center">
                                                <div class="col-12 col-md-6">
                                                    <h5 class="text-nowrap text-center mb-3">Temperature</h5>
                                                    <div id="gauge-temperature-{{ $area->id }}" class="mx-auto chart w-100">
                                                    </div>

                                                </div>

                                                <div class="vr d-none d-md-block"></div>
                                                <hr class="d-block d-md-none">

                                                <div class="col-12 col-md-6">
                                                    <h5 class="text-nowrap text-center mb-3">Humidity</h5>
                                                    <div id="gauge-humidity-{{ $area->id }}" class="mx-auto chart w-100"></div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="badge badge-phoenix badge-phoenix-warning w-max-content fs-9 fs-md-8 mx-auto">No areas
                                available
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div
            class="badge badge-phoenix badge-phoenix-warning fs-9 fs-md-8 d-flex align-items-center justify-content-center w-max-content mx-auto">
            No stores available</div>
    @endforelse
</div>

@endsection

@push('css')
    <style>
        .store:last-child {
            border: none !important;
            margin-bottom: 0 !important;
        }

        .chart {
            height: 200px;
        }

        .vr {
            height: 200px;
            border-left: 1px solid #e7e7e7;
            opacity: 1;
        }
    </style>
@endpush

@push('scripts')
    <script>
        var stores = @json($stores);
        document.addEventListener('DOMContentLoaded', async function () {

            stores.forEach(store => {
                store.areas.forEach(async area => {
                    var tChart = initChart(`gauge-temperature-${area.id}`);
                    var hChart = initChart(`gauge-humidity-${area.id}`);
                    await createGaugeChartsWithSensorData(area, tChart, hChart);

                    setInterval(async () => {
                        await createGaugeChartsWithSensorData(area, tChart, hChart);
                    }, 10000);
                })
            });
        });
    </script>
@endpush
