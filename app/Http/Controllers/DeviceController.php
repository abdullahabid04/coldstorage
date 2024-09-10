<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Services\SensorDataService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    protected SensorDataService $sensorDataService;

    public function __construct(SensorDataService $sensorDataService)
    {
        $this->sensorDataService = $sensorDataService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $devices = Device::all();

        return view('admin.devices.index', compact('devices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.devices.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'nullable|string|max:255',
        ]);

        $device = new Device();
        $device->serial_number = $device->getSerial();
        $device->description = $request->description;
        $device->save();

        return redirect()->route('devices.index')->with('success', 'Device created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Device $device)
    {
        if (in_array(Auth::user()->role->id, [1, 2])) {
            return view('admin.devices.show', compact('device'));
        }

        $chartData = $this->sensorDataService->fetchData($device->id, false, false, '1d', orderByDirection: 'asc');

        $avgData = [
            '1d' => $this->sensorDataService->fetchAvgData($device->id, false, '1d'),
            '1w' => $this->sensorDataService->fetchAvgData($device->id, false, '1w'),
            '1m' => $this->sensorDataService->fetchAvgData($device->id, false, '1m'),
            '1y' => $this->sensorDataService->fetchAvgData($device->id, false, '1y'),
            'all' => $this->sensorDataService->fetchAvgData($device->id, false),
        ];

        return view('client.devices.show', compact('device', 'chartData', 'avgData'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Device $device)
    {
        return view('admin.devices.edit', compact('device'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Device $device)
    {
        $request->validate([
            'description' => 'nullable|string|max:255',
        ]);

        $device->description = $request->description;
        $device->save();

        return redirect()->route('devices.index')->with('success', 'Device updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Device $device)
    {
        $device->delete();

        return redirect()->route('devices.index')->with('success', 'Device deleted successfully.');
    }
}
