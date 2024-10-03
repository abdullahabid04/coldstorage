@extends('layouts.client')

@section('content')

    <style>
        .store:last-child {
            border: none !important;
        }
    </style>

    <div class="pb-5">
        @foreach ($stores as $store)
            <div class="row m-4 pb-4 border-bottom store">
                <div class="col-12">
                    <div class="mb-4">
                        <h2 class="mb-2">{{ $store->title }}</h2>
                        <h5 class="text-body-tertiary fw-semibold">{{ $store->address }}</h5>
                    </div>
                    <div class="col-12">
                        <div class="row store">
                            @foreach ($store->areas as $area)
                                <div class="col-6 mb-3">
                                    <div class="card h-100 border">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <h5 class="mb-1">
                                                    <a href="{{ route('areas.show', $area->id) }}"
                                                       class="text-decoration-none text-dark">{{ $area->title }}</a>
                                                </h5>
                                            </div>

                                            <div>
                                                <div class="d-flex justify-content-between">
                                                    <div class="col-6">
                                                        <h5 class="text-nowrap text-center mb-3">Temperature</h5>
                                                        <div id="gauge-temperature-{{ $area->id }}" class="mx-auto"
                                                             style="width: 100%; height: 200px"></div>
                                                    </div>
                                                    <div style="border-left: 1px solid #dee2e6; height: 250px"></div>
                                                    <div class="col-6">
                                                        <h5 class="text-nowrap text-center mb-3">Humidity</h5>
                                                        <div id="gauge-humidity-{{ $area->id }}" class="mx-auto"
                                                             style="width: 100%; height: 200px"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection

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
