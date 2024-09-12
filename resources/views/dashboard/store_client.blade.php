@extends('layouts.client')

@section('content')

<div class="pb-5">
    @foreach ($stores as $store)
    <div class="row">
        <div class="col-12">
            <div class="mb-4">
                <h2 class="mb-2">{{ $store->title }}</h2>
                <h5 class="text-body-tertiary fw-semibold">{{ $store->address }}</h5>
            </div>
            <div class="col-12">
                <div class="row">
                    @foreach ($store->areas as $area)
                    <div class="col-4">
                        <div class="card h-100 border">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h5 class="mb-1">
                                        <a href="{{ route('areas.show', $area->id) }}" class="text-decoration-none text-dark">{{ $area->title }}</a>
                                    </h5>
                                </div>

                                <div>
                                    <div class="d-flex justify-content-between">
                                        <div class="col-6">
                                            <h6 class="text-nowrap text-center">Temperature</h6>
                                            <div id="gauge-temperature-{{ $area->id }}" class="mx-auto" style="width: 100%; height: 100px"></div>
                                        </div>
                                        <div style="border-left: 1px solid #dee2e6; height: 100px;"></div>
                                        <div class="col-6">
                                            <h6 class="text-nowrap text-center">Humidity</h6>
                                            <div id="gauge-humidity-{{ $area->id }}" class="mx-auto" style="width: 100%; height: 100px"></div>
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
    <hr>
    @endforeach
</div>

@endsection

@push('scripts')
<script>
    var stores = @json($stores);
    document.addEventListener('DOMContentLoaded', async function() {

        stores.forEach(store => {
            var devices = store.areas;

            devices.forEach(async function(device) {
                var temperatureChart = initChart(`gauge-temperature-${device.id}`, gaugeChartOption(device.latestRecord.temperature, 'Temperature', 'Temperature', 0, 50, '°C'));
                var humidityChart = initChart(`gauge-humidity-${device.id}`, gaugeChartOption(device.latestRecord.humidity, 'Humidity', 'Humidity', 0, 100, '%'));
            });
        });
    });
</script>
@endpush
