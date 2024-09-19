@extends('layouts.client')

@section('content')
    <div class="pb-5">
        <div class="row g-4">
            <div class="col-12 col-xxl-12">
                <div class="mb-8">
                    <h2 class="mb-2">{{ $area->title }}</h2>
                    <h5 class="text-body-tertiary fw-semibold">{{ $area->store->title }}</h5>
                </div>
                <div class="row align-items-center g-4">
                    <div class="col-12 col-md-auto">
                        <div class="d-flex align-items-center">
            <span class="fa-stack" style="min-height: 46px;min-width: 46px;">
              <span class="fa-solid fa-square fa-stack-2x dark__text-opacity-50 text-success-light"
                    data-fa-transform="down-4 rotate--10 left-4"></span>
              <span class="fa-solid fa-circle fa-stack-2x stack-circle text-stats-circle-success"
                    data-fa-transform="up-4 right-3 grow-2"></span>
              <span class="fa-stack-1x fa-solid fa-calendar-day text-success "
                    data-fa-transform="shrink-2 up-8 right-6"></span>
            </span>
                            <div class="ms-3">
                                <h4 class="mb-0">1 Day Avg</h4>
                                <p class="text-body-secondary fs-9 mb-0">
                                    <span class="fw-semibold">Temperature:</span> {{ $avgData['1d']['temperature'] }}°C
                                    <span class="fw-semibold">Humidity:</span> {{ $avgData['1d']['humidity'] }}%
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-auto">
                        <div class="d-flex align-items-center">
            <span class="fa-stack" style="min-height: 46px;min-width: 46px;">
              <span class="fa-solid fa-square fa-stack-2x dark__text-opacity-50 text-warning-light"
                    data-fa-transform="down-4 rotate--10 left-4"></span>
              <span class="fa-solid fa-circle fa-stack-2x stack-circle text-stats-circle-warning"
                    data-fa-transform="up-4 right-3 grow-2"></span>
              <span class="fa-stack-1x fa-solid fa-calendar-week text-warning "
                    data-fa-transform="shrink-2 up-8 right-6"></span>
            </span>
                            <div class="ms-3">
                                <h4 class="mb-0">1 Week Avg</h4>
                                <p class="text-body-secondary fs-9 mb-0">
                                    <span class="fw-semibold">Temperature:</span> {{ $avgData['1w']['temperature'] }}°C
                                    <span class="fw-semibold">Humidity:</span> {{ $avgData['1w']['humidity'] }}%
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-auto">
                        <div class="d-flex align-items-center">
            <span class="fa-stack" style="min-height: 46px;min-width: 46px;">
              <span class="fa-solid fa-square fa-stack-2x dark__text-opacity-50 text-danger-light"
                    data-fa-transform="down-4 rotate--10 left-4"></span>
              <span class="fa-solid fa-circle fa-stack-2x stack-circle text-stats-circle-danger"
                    data-fa-transform="up-4 right-3 grow-2"></span>
              <span class="fa-stack-1x fa-solid fa-calendar-days text-danger "
                    data-fa-transform="shrink-2 up-8 right-6"></span>
            </span>
                            <div class="ms-3">
                                <h4 class="mb-0">1 Month Avg</h4>
                                <p class="text-body-secondary fs-9 mb-0">
                                    <span class="fw-semibold">Temperature:</span> {{ $avgData['1m']['temperature'] }}°C
                                    <span class="fw-semibold">Humidity:</span> {{ $avgData['1m']['humidity'] }}%
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-auto">
                        <div class="d-flex align-items-center">
            <span class="fa-stack" style="min-height: 46px;min-width: 46px;">
              <span class="fa-solid fa-square fa-stack-2x dark__text-opacity-50 text-info-light"
                    data-fa-transform="down-4 rotate--10 left-4"></span>
              <span class="fa-solid fa-circle fa-stack-2x stack-circle text-stats-circle-info"
                    data-fa-transform="up-4 right-3 grow-2"></span>
              <span class="fa-stack-1x fa-solid fa-calendar text-info "
                    data-fa-transform="shrink-2 up-8 right-6"></span>
            </span>
                            <div class="ms-3">
                                <h4 class="mb-0">All time Avg</h4>
                                <p class="text-body-secondary fs-9 mb-0">
                                    <span class="fw-semibold">Temperature:</span> {{ $avgData['all']['temperature'] }}°C
                                    <span class="fw-semibold">Humidity:</span> {{ $avgData['all']['humidity'] }}%
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="bg-body-secondary mb-6 mt-4"/>


                <div class="d-flex align-items-center justify-content-between mb-4 g-3">
                    <div>
                        <h3>Device Environmental Data</h3>
                        <p class="text-body-tertiary lh-sm mb-0">Temperature and Humidity over different time frames</p>
                    </div>
                    <div>
                        <div class="btn-group" role="group" aria-label="Timeframes">
                            <button type="button" class="btn btn-outline-primary" data-timeframe="1h">1 Hour</button>
                            <button type="button" class="btn btn-outline-primary" data-timeframe="1d">1 Day</button>
                            <button type="button" class="btn btn-outline-primary" data-timeframe="1w">1 Week</button>
                            <button type="button" class="btn btn-outline-primary" data-timeframe="1m">1 Month</button>
                            <button type="button" class="btn btn-outline-primary" data-timeframe="all">All Time</button>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-6">
                        <div id="tempChart" style="height: 400px; width: 100%;"></div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div id="humidChart" style="height: 400px; width: 100%;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        const formatTimestamp = (timestamp, timeframe) => {
            const date = new Date(timestamp);
            const optionsTime = { hour: 'numeric', minute: 'numeric', hour12: true };

            switch (timeframe) {
                case '1h':
                    return date.toLocaleTimeString('en-GB', optionsTime);

                default:
                    return date.toLocaleDateString('en-GB', { day: 'numeric', month: 'short' }) + ', ' +
                        date.toLocaleTimeString('en-GB', optionsTime);
            }
        };

    </script>
    <script>
        var area = @json($area);
        var device = area.device[0];
        var chartData = @json($chartData);
        var timestamps = chartData.map(item => {
            return formatTimestamp(item.timestamp, '1d')
        });
        console.log(timestamps)
        var temperatures = chartData.map(item => item.temperature);
        var humidity = chartData.map(item => item.humidity);

        var tempOptions = {
            xAxis: {
                type: 'category',
                data: timestamps,
                // axisLabel: { rotate: 45 } // Rotate labels for better readability
            },
            yAxis: {
                type: 'value',
                name: 'Temperature (°C)'
            },
            grid: {
                top: '10%',
                bottom: '15%',
                left: '10%',
                right: '10%'
            },
            legend: {data: ['Temperature']},
            tooltip: {trigger: 'axis', axisPointer: {type: 'cross'}},
            series: [{
                name: 'Temperature',
                type: 'line',
                data: temperatures,
                animation: true,
                itemStyle: {
                    color: '#FF401F'
                }
            }],
        }

        var humidOptions = {
            xAxis: {
                type: 'category',
                data: timestamps,
                // axisLabel: { rotate: 45 } // Rotate labels for better readability
            },
            yAxis: {
                type: 'value',
                name: 'Humidity (%)'
            },
            grid: {
                top: '10%',
                bottom: '15%',
                left: '10%',
                right: '10%'
            },
            legend: {data: ['Humidity']},
            tooltip: {trigger: 'axis', axisPointer: {type: 'cross'}},
            series: [{
                name: 'Humidity',
                type: 'line',
                data: humidity,
                animation: true,
                itemStyle: {
                    color: '#3D7FFF'
                },
            }],
        }

        var tChart = echarts.init(document.getElementById('tempChart'));
        tChart.setOption(tempOptions);

        var hChart = echarts.init(document.getElementById('humidChart'));
        hChart.setOption(humidOptions);

        // Handle button clicks
        document.querySelectorAll('button[data-timeframe]').forEach(button => {
            button.addEventListener('click', function () {
                var timeframe = this.getAttribute('data-timeframe');
                fetch(`/api/sensor-data/${device.id}?startDate=${timeframe}&orderByDirection=asc&latest=`)
                    .then(response => response.json())
                    .then(data => {
                        timestamps = data.map(item => {
                            return formatTimestamp(item.timestamp, timeframe)
                        });
                        temperatures = data.map(item => item.temperature);
                        humidity = data.map(item => item.humidity);

                        tempOptions.xAxis.data = humidOptions.xAxis.data = timestamps;
                        tempOptions.series[0].data = temperatures;
                        humidOptions.series[0].data = humidity;

                        tChart.setOption(tempOptions);
                        hChart.setOption(humidOptions);
                    });
            });
        });

        // Resize charts on window resize
        window.addEventListener('resize', function () {
            tChart.resize();
            hChart.resize();
        });
    </script>
@endpush
