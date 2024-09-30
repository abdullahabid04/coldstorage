const charts = [];

const initChart = (chartId) => {
    const chart = echarts.init(document.getElementById(chartId));
    charts.push(chart);
    return chart;
};

const updateChart = (chart, options) => {
    chart.setOption(options, true)
};

const setTitle = (option, title) => {
    if (title) {
        option.title = {text: title};
    }
};

const resizeChart = () => {
    charts.forEach((chart) => {
        chart.resize();
    });
};

window.addEventListener("resize", resizeChart);

const lineOpt = (xData, name, data, color = "#00f") => {
    return {
        xAxis: {
            type: 'category',
            data: xData,
        },
        yAxis: {
            type: 'value',
            name: '',
            axisLabel: { show: true }
        },
        grid: {
            top: '15%',
            bottom: '15%',
            left: '10%',
            right: '10%',
        },
        legend: {data: [name]},
        tooltip: {trigger: 'axis', axisPointer: {type: 'cross'}},
        series: [{
            name,
            type: 'line',
            data,
            animation: true,
            itemStyle: {
                color
            }
        }],
    }
}

const gaugeOpt = (lightColor, darkColor, value, unit, min = 0, max = 100, splitNumber = 4) => {
    return {
        series: [
            {
                type: 'gauge',
                center: ['50%', '60%'],
                startAngle: 200,
                endAngle: -20,
                min,
                max,
                splitNumber: splitNumber, // Adjusting split number
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
                    splitNumber: 4, // Set to 4 for 25-unit intervals
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
                    distance: 3,
                    color: '#999',
                    fontSize: 992 >= window.innerWidth <= 1024 ? 10 : 12,
                    formatter: (value) => {
                        return Math.round(value);
                    }
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
                    fontSize: 992 >= window.innerWidth <= 1024 ? 16 : 20,
                    fontWeight: 'bolder',
                    formatter: `{value} ${unit}`,
                    color: '#999',
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
                min,
                max,
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
};

async function createLineChartsWithSensorData(areaId, deviceId, timeframe, tChart, hChart) {
    const data = await getSensorData(`${areaId}/${deviceId}?startDate=${timeframe}&orderByDirection=asc&orderByCol=timestamp&latest=`)

    if (!data) return;

    timestamps = data.map(item => {
        return formatTimestamp(item.timestamp, timeframe)
    });
    temperature = data.map(item => item.temperature);
    humidity = data.map(item => item.humidity);

    updateChart(tChart, lineOpt(timestamps, "Temperature (°C)", temperature, "#ff401f"));
    updateChart(hChart, lineOpt(timestamps, "Humidity (%)", humidity, "#3d7fff"));
}

async function createGaugeChartsWithSensorData(area, tChart, hChart, timeframe = "all") {
    const device = area.device[0];

    if (!device) return;

    const data = await getSensorData(`${area.id}/${device.id}?startDate=${timeframe}&latest=true`);

    if (!data) return;

    updateChart(tChart, gaugeOpt('#FF6F6B', '#FF401F', data.temperature, '°C', -10, 60));
    updateChart(hChart, gaugeOpt('#66A3FF', '#3D7FFF', data.humidity, '%'));
}
