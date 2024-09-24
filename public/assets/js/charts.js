const charts = [];

const initChart = (chartId, option) => {
    const chart = echarts.init(document.getElementById(chartId));
    chart.setOption(option);
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
            name,
        },
        grid: {
            top: '10%',
            bottom: '15%',
            left: '10%',
            right: '10%'
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

const gaugeOpt = (lightColor, darkColor, value, unit) => {
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

async function createLineChartsWithSensorData(deviceId, timeframe){
    const data = await getSensorData(`${deviceId}?startDate=${timeframe}&orderByDirection=asc&latest=`)

    timestamps = data.map(item => {
        return formatTimestamp(item.timestamp, timeframe)
    });
    temperature = data.map(item => item.temperature);
    humidity = data.map(item => item.humidity);

    updateChart(tChart, lineOpt(timestamps, "Temperature (°C)", temperature, "#ff401f"));
    updateChart(hChart, lineOpt(timestamps, "Humidity (%)", humidity, "#3d7fff"));
}
