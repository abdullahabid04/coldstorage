<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Rollout;
use App\Models\UpdateLog;
use App\Models\UpdateProgress;
use Illuminate\Http\Request;

class UpdateProgressController extends Controller
{
    public function index()
    {
        // Fetch all update progress records and group them by firmware_id and device_id
        $progresses = UpdateProgress::with('device', 'firmwareUpdate')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.ota_updates.update_progress.index', compact('progresses'));
    }

    public function updateProgress(Request $request)
    {
        // Validate incoming request
        $validated = $request->validate([
            'device_serial' => 'required|string',
            'firmware_update_id' => 'required|numeric',
            'status' => 'required|string',
        ]);

        // Find the device by serial number
        $device = Device::where('serial_number', $validated['device_serial'])->first();

        if (!$device) {
            return response()->json(['error' => 'Device not found'], 404);
        }

        // Create the update log entry
        UpdateProgress::create([
            'device_id' => $device->id,
            'firmware_update_id' => $validated['firmware_update_id'] == 0 ? null : $validated['firmware_update_id'],
            'status' => $validated['status'],
            'progress' => 100,
        ]);

        // Return a successful response
        return response()->json(['message' => 'Log updated successfully'], 201);
    }
}
