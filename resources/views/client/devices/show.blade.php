@extends('layouts.client')

@section('content')
<div class="pb-5">
  <div class="row g-4">
    <div class="col-12 col-xxl-8">
      <div class="mb-8">
        <h2 class="mb-2">D-{{ $device->id }}</h2>
        <h5 class="text-body-tertiary fw-semibold">{{ $device->description }}</h5>
      </div>
      <div class="row align-items-center g-4">
        <div class="col-12 col-md-auto">
          <div class="d-flex align-items-center">
            <span class="fa-stack" style="min-height: 46px;min-width: 46px;">
              <span class="fa-solid fa-square fa-stack-2x dark__text-opacity-50 text-success-light" data-fa-transform="down-4 rotate--10 left-4"></span>
              <span class="fa-solid fa-circle fa-stack-2x stack-circle text-stats-circle-success" data-fa-transform="up-4 right-3 grow-2"></span>
              <span class="fa-stack-1x fa-solid fa-calendar-day text-success " data-fa-transform="shrink-2 up-8 right-6"></span>
            </span>
            <div class="ms-3">
              <h4 class="mb-0">Last 1 day Avg</h4>
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
              <span class="fa-solid fa-square fa-stack-2x dark__text-opacity-50 text-warning-light" data-fa-transform="down-4 rotate--10 left-4"></span>
              <span class="fa-solid fa-circle fa-stack-2x stack-circle text-stats-circle-warning" data-fa-transform="up-4 right-3 grow-2"></span>
              <span class="fa-stack-1x fa-solid fa-calendar-week text-warning " data-fa-transform="shrink-2 up-8 right-6"></span>
            </span>
            <div class="ms-3">
              <h4 class="mb-0">Last 1 week Avg</h4>
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
              <span class="fa-solid fa-square fa-stack-2x dark__text-opacity-50 text-danger-light" data-fa-transform="down-4 rotate--10 left-4"></span>
              <span class="fa-solid fa-circle fa-stack-2x stack-circle text-stats-circle-danger" data-fa-transform="up-4 right-3 grow-2"></span>
              <span class="fa-stack-1x fa-solid fa-calendar-days text-danger " data-fa-transform="shrink-2 up-8 right-6"></span>
            </span>
            <div class="ms-3">
              <h4 class="mb-0">Last 1 month Avg</h4>
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
              <span class="fa-solid fa-square fa-stack-2x dark__text-opacity-50 text-info-light" data-fa-transform="down-4 rotate--10 left-4"></span>
              <span class="fa-solid fa-circle fa-stack-2x stack-circle text-stats-circle-info" data-fa-transform="up-4 right-3 grow-2"></span>
              <span class="fa-stack-1x fa-solid fa-calendar text-info " data-fa-transform="shrink-2 up-8 right-6"></span>
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

      <hr class="bg-body-secondary mb-6 mt-4" />

      <div class="row flex-between-center mb-4 g-3">
        <div class="col-auto">
          <h3>Device Environmental Data</h3>
          <p class="text-body-tertiary lh-sm mb-0">Temperature and Humidity over different time frames</p>
        </div>
        <div class="col-12">
          <div class="btn-group" role="group" aria-label="Timeframes">
            <button type="button" class="btn btn-outline-primary" data-timeframe="1d">Last 1 Day</button>
            <button type="button" class="btn btn-outline-primary" data-timeframe="1w">Last 1 Week</button>
            <button type="button" class="btn btn-outline-primary" data-timeframe="1m">Last 1 Month</button>
            <button type="button" class="btn btn-outline-primary" data-timeframe="all">All Time</button>
          </div>
        </div>
      </div>
      <div id="deviceChart" style="min-height:400px;width:100%"></div>
    </div>
  </div>
</div>

@endsection

@push('scripts')
<script>
  var device = @json($device);
  var chartData = @json($chartData);

  var timestamps = chartData.map(item => item.timestamp);
  var temperatures = chartData.map(item => item.temperature);
  var humidity = chartData.map(item => item.humidity);

  var options = {
    xAxis: {
      type: 'category',
      data: timestamps
    },
    yAxis: {
      type: 'value'
    },
    legend: {
      data: ['Temperature (°C)', 'Humidity (%)']
    },
    tooltip: {
      trigger: 'axis',
      axisPointer: {
        type: 'cross'
      }
    },
    series: [{
        name: 'Temperature (°C)',
        type: 'line',
        data: temperatures,
        animation: true
      },
      {
        name: 'Humidity (%)',
        type: 'line',
        data: humidity,
        animation: true
      }
    ]
  };

  var chart = echarts.init(document.getElementById('deviceChart'));
  chart.setOption(options);

  // Handle button clicks
  document.querySelectorAll('button[data-timeframe]').forEach(button => {
    button.addEventListener('click', function() {
      var timeframe = this.getAttribute('data-timeframe');
      fetch(`/api/sensor-data/${device.id}?startDate=${timeframe}&orderByDirection=asc&latest=`)
        .then(response => response.json())
        .then(data => {
          timestamps = data.map(item => item.timestamp);
          temperatures = data.map(item => item.temperature);
          humidity = data.map(item => item.humidity);

          options.xAxis.data = timestamps;
          options.series[0].data = temperatures;
          options.series[1].data = humidity;

          chart.setOption(options);
        });
    });
  });
</script>
@endpush