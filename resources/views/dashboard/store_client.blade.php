@extends('layouts.client')

@section('content')

    <style>
        .store:last-child{
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
                    <div class="col-6">
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
                                            <h5 class="text-nowrap text-center mb-3">Temperature</h5>
                                            <div id="gauge-temperature-{{ $area->id }}" class="mx-auto" style="width: 100%; height: 200px"></div>
                                        </div>
                                        <div style="border-left: 1px solid #dee2e6; height: 250px"></div>
                                        <div class="col-6">
                                            <h5 class="text-nowrap text-center mb-3">Humidity</h5>
                                            <div id="gauge-humidity-{{ $area->id }}" class="mx-auto" style="width: 100%; height: 200px"></div>
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
    function gaugeOpt(lightColor, darkColor, value, unit) {
        return {
            series: [
                {
                    type: 'gauge',
                    center: ['50%', '60%'],
                    startAngle: 200,
                    endAngle: -20,
                    min: 0,
                    max: 60,
                    splitNumber: 12,
                    itemStyle: {
                        color: lightColor
                    },
                    progress: {
                        show: true,
                        width: 30
                    },
                    pointer: {
                        show: false
                    },
                    axisLine: {
                        lineStyle: {
                            width: 30
                        }
                    },
                    axisTick: {
                        distance: -45,
                        splitNumber: 5,
                        lineStyle: {
                            width: 2,
                            color: '#999'
                        }
                    },
                    splitLine: {
                        distance: -52,
                        length: 14,
                        lineStyle: {
                            width: 3,
                            color: '#999'
                        }
                    },
                    axisLabel: {
                        distance: -5,
                        color: '#999',
                        fontSize: 12
                    },
                    anchor: {
                        show: false
                    },
                    title: {
                        show: false
                    },
                    detail: {
                        valueAnimation: true,
                        width: '60%',
                        lineHeight: 40,
                        borderRadius: 8,
                        offsetCenter: [0, '-15%'],
                        fontSize: 20,
                        fontWeight: 'bolder',
                        formatter: `{value} ${unit}`,
                        color: '#999'
                    },
                    data: [
                        {
                            value
                        }
                    ]
                },
                {
                    type: 'gauge',
                    center: ['50%', '60%'],
                    startAngle: 200,
                    endAngle: -20,
                    min: 0,
                    max: 60,
                    itemStyle: {
                        color: darkColor
                    },
                    progress: {
                        show: true,
                        width: 8
                    },
                    pointer: {
                        show: false
                    },
                    axisLine: {
                        show: false
                    },
                    axisTick: {
                        show: false
                    },
                    splitLine: {
                        show: false
                    },
                    axisLabel: {
                        show: false
                    },
                    detail: {
                        show: false
                    },
                    data: [
                        {
                            value
                        }
                    ]
                }
            ]
        };
    }

    var stores = @json($stores);
    document.addEventListener('DOMContentLoaded', async function() {
        stores.forEach(store => {
            var devices = store.areas;

            devices.forEach(async function(device) {
                var device_id = device.id;

                var temperatureChart = initChart(`gauge-temperature-${device_id}`, gaugeOpt('#FF6F6B', '#FF401F', device.latestRecord.temperature, '°C'));
                var humidityChart = initChart(`gauge-humidity-${device_id}`, gaugeOpt('#66A3FF', '#3D7FFF', device.latestRecord.humidity, '%'));

            });
        });
    });

</script>
@endpush
