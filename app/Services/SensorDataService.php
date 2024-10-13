<?php

namespace App\Services;

use App\Models\SensorData;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;

use function PHPSTORM_META\map;

class SensorDataService
{
    /**
     * Fetch sensor data based on parameters.
     *
     * @param int $deviceId
     * @param bool $jsonResponse
     * @param bool $latest
     * @param mixed $startDate
     * @param string $orderByCol
     * @param string $orderByDirection
     * @return Collection|SensorData|JsonResponse
     */
    public function fetchData(int $areaId, int $deviceId, bool $jsonResponse = true, bool $latest = true, $startDate = 'all', string $orderByCol = 'timestamp', string $orderByDirection = 'desc'): Collection|SensorData|JsonResponse
    {
        $latest = request()->get('latest', $latest);
        $orderByCol = request()->get('orderByCol', $orderByCol);
        $orderByDirection = request()->get('orderByDirection', $orderByDirection);
        $startDate = request()->get('startDate', $startDate);
        $startDate = mapTimeframe($startDate);
        $endDate = Carbon::now();

        $query = SensorData::where('device_id', $deviceId)
            ->where('area_id', $areaId)
            ->when($startDate, fn($query) => $query->whereBetween('timestamp', [$startDate, $endDate]))
            ->orderBy($orderByCol, $orderByDirection);

        $precision = request()->get('precision', 0);

        if ($latest) {
            $sensorData = $query->first();
            if ($sensorData) {
                $sensorData->humidity = round($sensorData->humidity, $precision, PHP_ROUND_HALF_DOWN);
                $sensorData->temperature = round($sensorData->temperature, $precision, PHP_ROUND_HALF_DOWN);
            }
        } else {
            $sensorData = $query->get()->map(function ($item) use ($precision) {
                if (isset($item->temperature)) {
                    $item->temperature = round($item->temperature, $precision, PHP_ROUND_HALF_DOWN);
                }
                if (isset($item->humidity)) {
                    $item->humidity = round($item->humidity, $precision, PHP_ROUND_HALF_DOWN);
                }
                return $item;
            });
        }

        if (!$sensorData) return response()->json(null, 404);

        return $jsonResponse ? response()->json($sensorData) : $sensorData;
    }

    /**
     * Fetch avg sensor data based on parameters.
     *
     * @param int $deviceId
     * @param bool $jsonResponse
     * @param mixed $startDate
     * @return array|JsonResponse
     */
    public function fetchAvgData(int $areaId, int $deviceId, bool $jsonResponse = true, string|null $startDate = null): array|JsonResponse
    {
        $query = SensorData::where('device_id', $deviceId)->where('area_id', $areaId);

        $startDate = request()->get('startDate', $startDate);

        if ($startDate) {
            $endDate = Carbon::now();
            $startDate = mapTimeframe($startDate);
            $query->whereBetween('timestamp', [$startDate, $endDate]);
        }

        $avgTemperature = $query->avg('temperature');
        $avgHumidity = $query->avg('humidity');

        $avgData = [
            'temperature' => round($avgTemperature) ?? 0,
            'humidity' => round($avgHumidity) ?? 0,
        ];

        return $jsonResponse ? response()->json($avgData) : $avgData;
    }

    public function fetchDataForReport($areaId, $startDate, $endDate)
    {
        if (!isAuthArea($areaId)) return null;

        $lastNDays = convertToLastNDays($startDate, $endDate);
        $days = $lastNDays['days'];

        if ($days === 1) {
            $groupBy = "DATE_FORMAT(timestamp, '%Y-%m-%d %H:00:00')";
        } elseif ($days > 1 && $days <= 30) {
            $groupBy = "DATE_FORMAT(timestamp, '%Y-%m-%d')";
        } elseif ($days > 30 && $days <= 90) {
            $groupBy = "WEEK(timestamp)";
        } elseif ($days > 90 && $days <= 365) {
            $groupBy = "DATE_FORMAT(timestamp, '%Y-%m')";
        } else {
            $groupBy = "YEAR(timestamp)";
        }

        return SensorData::where('area_id', $areaId)
            ->whereBetween('timestamp', [$startDate, $endDate])
            ->selectRaw("
        ROUND(AVG(temperature), 2) as average_temperature,
        ROUND(AVG(humidity), 2) as average_humidity,
        MIN(timestamp) as timestamp,
        $groupBy as time_bucket
    ")
            ->groupBy('time_bucket')
            ->orderBy('timestamp', 'asc')
            ->get();
    }
}
