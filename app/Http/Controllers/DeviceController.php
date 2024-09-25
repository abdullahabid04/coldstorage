<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\DeviceEvent;
use App\Models\DeviceStatus;
use App\Models\WifiStatus;
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

    /* =======================================
     * Device Status (Set/Get)
     * =======================================
     */

    /**
     * Set the status of a device (true/false).
     */
    public function setDeviceStatus(Request $request, $device_id)
    {
        $request->validate([
            'status' => 'required|boolean', // Device status should be either true or false
        ]);

        $device = Device::findOrFail($device_id);

        $deviceStatus = DeviceStatus::updateOrCreate(
            ['device_id' => $device->id],
            ['status' => $request->status]
        );

        return response()->json([
            'success' => true,
            'message' => 'Device status set successfully.',
            'device_status' => $deviceStatus,
        ], 200);
    }

    /**
     * Get the current status of a device.
     */
    public function getDeviceStatus($device_id)
    {
        $deviceStatus = DeviceStatus::where('device_id', $device_id)->first();

        if (!$deviceStatus) {
            return response()->json([
                'success' => false,
                'message' => 'No status found for this device.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'device_status' => $deviceStatus->status,
        ], 200);
    }

    /* =======================================
     * Device Time Delay (Set/Get)
     * =======================================
     */

    /**
     * Set the time delay for device request calls.
     */
    public function setTimeDelay(Request $request, $device_id)
    {
        $request->validate([
            'time_delay' => 'required|integer|min:0', // Minimum time delay should be 0 or more
        ]);

        $device = Device::findOrFail($device_id);

        $deviceStatus = DeviceStatus::updateOrCreate(
            ['device_id' => $device->id],
            ['time_delay' => $request->time_delay]
        );

        return response()->json([
            'success' => true,
            'message' => 'Device time delay set successfully.',
            'device_status' => $deviceStatus,
        ], 200);
    }

    /**
     * Get the time delay for a device.
     */
    public function getTimeDelay($device_id)
    {
        $deviceStatus = DeviceStatus::where('device_id', $device_id)->first();

        if (!$deviceStatus) {
            return response()->json([
                'success' => false,
                'message' => 'No time delay found for this device.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'time_delay' => $deviceStatus->time_delay,
        ], 200);
    }

    /* =======================================
     * Wi-Fi Status (Set/Get)
     * =======================================
     */

    /**
     * Set the Wi-Fi credentials (SSID and password) for a device.
     */
    public function setWifiCredentials(Request $request, $device_id)
    {
        $request->validate([
            'ssid' => 'required|string|max:255',
            'password' => 'nullable|string|max:255',
        ]);

        $device = Device::findOrFail($device_id);

        $wifiStatus = WifiStatus::updateOrCreate(
            ['device_id' => $device->id],
            [
                'ssid' => $request->ssid,
                'password' => $request->password,
            ]
        );

        return response()->json([
            'success' => true,
            'message' => 'Wi-Fi credentials set successfully.',
            'wifi_status' => $wifiStatus,
        ], 200);
    }

    /**
     * Get the current Wi-Fi credentials for a device.
     */
    public function getWifiCredentials($device_id)
    {
        $wifiStatus = WifiStatus::where('device_id', $device_id)->first();

        if (!$wifiStatus) {
            return response()->json([
                'success' => false,
                'message' => 'No Wi-Fi credentials found for this device.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'ssid' => $wifiStatus->ssid,
            'password' => $wifiStatus->password,
        ], 200);
    }

    /**
     * Set the Wi-Fi state (connected or hotspot).
     */
    public function setWifiState(Request $request, $device_id)
    {
        $request->validate([
            'set_state' => 'required|in:connected,hotspot',
        ]);

        $device = Device::findOrFail($device_id);

        $wifiStatus = WifiStatus::updateOrCreate(
            ['device_id' => $device->id],
            ['set_state' => $request->set_state]
        );

        return response()->json([
            'success' => true,
            'message' => 'Wi-Fi state set successfully.',
            'wifi_status' => $wifiStatus,
        ], 200);
    }

    /**
     * Get the current Wi-Fi state of a device.
     */
    public function getWifiState($device_id)
    {
        $wifiStatus = WifiStatus::where('device_id', $device_id)->first();

        if (!$wifiStatus) {
            return response()->json([
                'success' => false,
                'message' => 'No Wi-Fi state found for this device.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'get_state' => $wifiStatus->get_state,
        ], 200);
    }

    /* =======================================
     * Device Events (Update/Get)
     * =======================================
     */

    /**
     * Update a device event with type and message.
     */
    public function updateDeviceEvent(Request $request, $device_id)
    {
        $request->validate([
            'event_type' => 'required|in:info,warning,error',
            'message' => 'required|string',
        ]);

        $device = Device::findOrFail($device_id);

        $event = DeviceEvent::updateOrCreate(
            ['device_id' => $device->id],
            [
                'event_type' => $request->event_type,
                'message' => $request->message,
            ]
        );

        return response()->json([
            'success' => true,
            'message' => 'Device event updated successfully.',
            'event' => $event,
        ], 200);
    }

    /**
     * Get the device events.
     */
    public function getDeviceEvents($device_id)
    {
        $device = Device::findOrFail($device_id);

        $events = DeviceEvent::where('device_id', $device->id)->orderBy('created_at', 'desc')->get();

        return response()->json([
            'success' => true,
            'events' => $events,
        ], 200);
    }
}
