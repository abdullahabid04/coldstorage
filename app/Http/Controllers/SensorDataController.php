<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\SensorData;
use App\Services\SensorDataService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SensorDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(SensorData $sensorData)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SensorData $sensorData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SensorData $sensorData)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SensorData $sensorData)
    {
        //
    }

    public function fetch(Request $request, string $entityType, int $entityId, bool $json = true)
    {
        return app(SensorDataService::class)->fetchSensorData($request, $entityId, $entityType, $json);
    }

    public function fetchEnergyData(Request $request, string $entityType, int $entityId, bool $json = true)
    {
        return app(SensorDataService::class)->fetchEnergyData($request, $entityId, $entityType, $json);
    }

    // Method to fetch temperature data
    public function fetchTemperature(Request $request)
    {
        $deviceId = $request->input('device_id');
        $timeRange = $request->input('time_range', 'latest');

        // Fetch temperature data based on the time range
        if ($timeRange == 'latest') {
            // Get the latest temperature entry
            $data = SensorData::where('device_id', $deviceId)
                ->orderBy('timestamp', 'desc')
                ->first(['temperature', 'timestamp']);
        } else {
            // Fetch data for the specified time range with windowing
            $data = $this->fetchDataWithWindowing($deviceId, $timeRange, 'temperature');
        }

        return response()->json($data);
    }

    // Method to fetch humidity data
    public function fetchHumidity(Request $request)
    {
        $deviceId = $request->input('device_id');
        $timeRange = $request->input('time_range', 'latest');

        // Fetch humidity data based on the time range
        if ($timeRange == 'latest') {
            // Get the latest humidity entry
            $data = SensorData::where('device_id', $deviceId)
                ->orderBy('timestamp', 'desc')
                ->first(['humidity', 'timestamp']);
        } else {
            // Fetch data for the specified time range with windowing
            $data = $this->fetchDataWithWindowing($deviceId, $timeRange, 'humidity');
        }

        return response()->json($data);
    }

    // Helper method for windowing/bucketing
    private function fetchDataWithWindowing($deviceId, $timeRange, $field)
    {
        $query = SensorData::where('device_id', $deviceId);

        // Define the time frame
        switch ($timeRange) {
            case 'last_hour':
                $startTime = Carbon::now()->subHour();
                $bucketSize = 1; // minutes
                break;
            case 'last_day':
                $startTime = Carbon::now()->subDay();
                $bucketSize = 60; // hourly average
                break;
            case 'last_week':
                $startTime = Carbon::now()->subWeek();
                $bucketSize = 6 * 60; // every 6 hours
                break;
            case 'last_month':
                $startTime = Carbon::now()->subMonth();
                $bucketSize = 12 * 60; // every 12 hours
                break;
            default:
                return []; // Handle invalid range
        }

        // Filter the data based on the time range
        $query->where('timestamp', '>=', $startTime);

        // Apply windowing by grouping and averaging over time buckets
        $data = $query->selectRaw("
            AVG($field) as $field,
            MIN(timestamp) as timestamp,
            FLOOR(UNIX_TIMESTAMP(timestamp) / ($bucketSize * 60)) as time_bucket
        ")
            ->groupBy('time_bucket')
            ->orderBy('timestamp', 'asc')
            ->get();

        return $data;
    }

    public function storeSensorData(Request $request)
    {
        // Define validation rules
        $validator = Validator::make($request->all(), [
            'serial_number' => 'required|string',
            'data' => 'required|array',
            'data.*.temperature' => 'required|numeric',
            'data.*.humidity' => 'required|numeric',
        ]);

        // Return validation errors if any
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 400);
        }

        // Get the validated data
        $validatedData = $validator->validated();
        $serialNumber = $validatedData['serial_number'];
        $sensorData = $validatedData['data'];

        // Find the device using serial_number
        $device = Device::where('serial_number', $serialNumber)->first();

        // If the device is not found, return an error
        if (!$device) {
            return response()->json([
                'success' => false,
                'message' => 'Device not found with the provided serial number.'
            ], 404);
        }

        // Find the related area through the device (assuming device is linked to one area)
        $area = $device->area()->first();

        // If no area is associated with the device, return an error
        if (!$area) {
            return response()->json([
                'success' => false,
                'message' => 'No area found associated with the device.'
            ], 404);
        }

        // Loop through the sensor data and store it
        foreach ($sensorData as $dataEntry) {
            SensorData::create([
                'device_id' => $device->id,
                'area_id' => $area->id,
                'timestamp' => now(),
                'temperature' => $dataEntry['temperature'],
                'humidity' => $dataEntry['humidity'],
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Sensor data has been stored successfully.',
        ], 201);
    }

    public function fetchData(int $areaId, int $deviceId, bool $jsonResponse = true, bool $latest = true, string $startDate = 'all', string $orderByCol = 'timestamp', string $orderByDirection = 'desc')
    {
        return app(SensorDataService::class)->fetchData($areaId, $deviceId, $jsonResponse, $latest, $startDate, $orderByCol, $orderByDirection);
    }

    public function fetchAvgData(int $areaId, int $deviceId, bool $jsonResponse = true, string|null $startDate = null)
    {
        return app(SensorDataService::class)->fetchAvgData($areaId, $deviceId, $jsonResponse, $startDate);
    }
}
