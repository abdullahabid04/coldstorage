@extends('layouts.app')

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
                        <div class="row">
                            @foreach ($store->areas as $area)
                                <div class="col-6 mb-3">
                                    <div class="card h-100 border">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <h5 class="mb-1">
                                                    {{ $area->title }}
                                                </h5>
                                            </div>

                                            <div>
                                                <div class="d-flex justify-content-between">
                                                    <div class="col-6">
                                                        <h6 class="text-nowrap text-center mb-3">Temperature</h6>
                                                        <div id="gauge-temperature-{{ $area->id }}" class="mx-auto"
                                                             style="width: 100%; height: 200px"></div>
                                                    </div>
                                                    <div style="border-left: 1px solid #dee2e6; height: 200px;"></div>
                                                    <div class="col-6">
                                                        <h6 class="text-nowrap text-center mb-3">Humidity</h6>
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
                store.areas.forEach(area => {
                    var temperatureChart = initChart(`gauge-temperature-${area.id}`, gaugeOpt('#FF6F6B', '#FF401F', area.latestRecord.temperature, '°C'));
                    var humidityChart = initChart(`gauge-humidity-${area.id}`, gaugeOpt('#66A3FF', '#3D7FFF', area.latestRecord.humidity, '%'));
                })
            });
        });
    </script>
@endpush
