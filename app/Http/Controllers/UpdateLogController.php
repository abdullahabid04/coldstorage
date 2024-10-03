<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Rollout;
use App\Models\UpdateLog;
use Illuminate\Http\Request;

class UpdateLogController extends Controller
{
    public function index()
    {
        // Fetch all update logs and group them by firmware_id and device_id
        $logs = UpdateLog::with('device', 'firmwareUpdate')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.ota_updates.device_logs.index', compact('logs'));
    }

    public function updateLog(Request $request)
    {
        // Validate incoming request
        $validated = $request->validate([
            'device_serial' => 'required|string',
            'firmware_update_id' => 'required|numeric',
            'message' => 'required|string',
            'level' => 'required|string',
        ]);

        // Find the device by serial number
        $device = Device::where('serial_number', $validated['device_serial'])->first();

        if (!$device) {
            return response()->json(['error' => 'Device not found'], 404);
        }

        // Create the update log entry
        UpdateLog::create([
            'device_id' => $device->id,
            'firmware_update_id' => $validated['firmware_update_id'] == 0 ? null : $validated['firmware_update_id'],
            'message' => $validated['message'],
            'level' => $validated['level'],
        ]);

        // Return a successful response
        return response()->json(['message' => 'Log updated successfully'], 201);
    }
}
