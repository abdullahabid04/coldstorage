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

//    public function fetchDataForReport($storeId, $startDate, $endDate)
//    {
//        // Get relative string and the actual number of days between start and end date
//        $lastNDays = convertToLastNDays($startDate, $endDate);
//        $timeRange = $lastNDays['relativeString']; // Use proper key for string representation
//        $days = $lastNDays['days'];
//
//        // Determine the appropriate bucket size based on the number of days
//        if ($days === 1) {
//            $bucketSize = 60; // hourly
//        } elseif ($days > 1 && $days <= 30) {
//            $bucketSize = 1440; // daily (24 hours * 60 minutes)
//        } elseif ($days > 30 && $days <= 90) {
//            $bucketSize = 10080; // weekly (7 days * 24 hours * 60 minutes)
//        } elseif ($days > 90 && $days <= 365) {
//            $bucketSize = 43800; // monthly (approx. 30.42 days * 24 hours * 60 minutes)
//        } else {
//            $bucketSize = 525600; // yearly (365 days * 24 hours * 60 minutes)
//        }
//
//        // Query the sensor data, bucketing by the determined time interval
//        $data = SensorData::whereHas('area', function ($query) use ($storeId) {
//            $query->where('store_id', $storeId);
//        })
//            ->whereBetween('timestamp', [$startDate, $endDate])  // Cleaner date range filtering
//            ->selectRaw("
//        AVG(temperature) as average_temperature,
//        AVG(humidity) as average_humidity,
//        MIN(timestamp) as timestamp,
//        FLOOR(UNIX_TIMESTAMP(timestamp) / ($bucketSize * 60)) as time_bucket
//    ")
//            ->groupBy('time_bucket')
//            ->orderBy('timestamp', 'asc')
//            ->get();
//
//        return $data;
//    }

    public function fetchDataForReport($areaId, $startDate, $endDate)
    {
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

        $data = SensorData::where('area_id', $areaId)
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

        return $data;
    }


}
