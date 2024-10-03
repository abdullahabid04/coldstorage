<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\DeviceGroup;
use App\Models\FirmwareUpdate;
use App\Models\Rollout;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class RolloutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all scheduled updates with related data
        $rollouts = Rollout::with('device', 'deviceGroup', 'firmwareUpdate')->get();

        return view('admin.ota_updates.rollouts.index', compact('rollouts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Fetch devices, device groups, and firmware versions for the selection
        $devices = Device::all();
        $deviceGroups = DeviceGroup::all();
        $firmwareUpdates = FirmwareUpdate::all();

        return view('admin.ota_updates.rollouts.create', compact('devices', 'deviceGroups', 'firmwareUpdates'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'device_id' => 'nullable|exists:devices,id',
            'device_group_id' => 'nullable|exists:device_groups,id',
            'firmware_update_id' => 'required|exists:firmware_updates,id',
            'rollout_percentage' => 'required|numeric|min:0|max:100',
            'staged_rollout' => 'required|boolean',
            'scheduled_at' => 'required|date|after:now',
        ]);

        // Ensure either device or device group is selected
        if (!$request->device_id && !$request->device_group_id) {
            return redirect()->back()->withErrors(['You must select either a device or a device group.']);
        }

        // Create the scheduled update
        Rollout::create([
            'device_id' => $request->device_id,
            'device_group_id' => $request->device_group_id,
            'firmware_update_id' => $request->firmware_update_id,
            'rollout_percentage' => $request->rollout_percentage,
            'staged_rollout' => $request->staged_rollout,
            'scheduled_at' => Carbon::parse($request->scheduled_at),
            'status' => 'pending',
        ]);

        return redirect()->route('rollouts.index')->with('success', 'OTA update scheduled successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rollout $rollout)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rollout $rollout)
    {
        // Fetch devices, device groups, and firmware versions for the selection
        $devices = Device::all();
        $deviceGroups = DeviceGroup::all();
        $firmwareVersions = FirmwareUpdate::all();

        return view('admin.ota_updates.rollouts.edit', compact('rollout', 'devices', 'deviceGroups', 'firmwareVersions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rollout $rollout)
    {
        // Validate the incoming request
        $request->validate([
            'device_id' => 'nullable|exists:devices,id',
            'device_group_id' => 'nullable|exists:device_groups,id',
            'firmware_update_id' => 'required|exists:firmware_updates,id',
            'rollout_percentage' => 'required|numeric|min:0|max:100',
            'staged_rollout' => 'required|boolean',
            'scheduled_at' => 'required|date|after:now',
        ]);

        // Ensure either device or device group is selected
        if (!$request->device_id && !$request->device_group_id) {
            return redirect()->back()->withErrors(['You must select either a device or a device group.']);
        }

        // Update the scheduled update
        $rollout->update([
            'device_id' => $request->device_id,
            'device_group_id' => $request->device_group_id,
            'firmware_update_id' => $request->firmware_update_id,
            'scheduled_at' => Carbon::parse($request->scheduled_at),
            'rollout_percentage' => $request->rollout_percentage,
            'staged_rollout' => $request->staged_rollout,
            'status' => 'pending',
        ]);

        return redirect()->route('rollouts.index')->with('success', 'Scheduled update updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rollout $rollout)
    {
        // Delete the scheduled update
        $rollout->delete();

        return redirect()->route('rollouts.index')->with('success', 'Scheduled update deleted successfully.');

    }

    public function updateStatus(Request $request, $id)
    {
        $rollout = Rollout::findOrFail($id);
        $request->validate(['status' => 'required|in:pending,in_progress,completed,failed']);
        $rollout->update(['status' => $request->status]);

        return response()->json(['message' => 'Scheduled update status updated']);
    }

    public function checkFirmwareUpdate(Request $request, $deviceSerial)
    {
        // Find the device by serial number
        $device = Device::where('serial_number', $deviceSerial)->first();

        if (!$device) {
            return response()->json(['error' => 'Device not found'], 404);
        }

        // Check if the device is part of a group or directly assigned to a rollout
        $rollout = null;

        if ($device->deviceGroups()->exists()) {
            $deviceGroup = $device->deviceGroups()->first(); // Get the first group
            $rollout = Rollout::where('device_group_id', $deviceGroup->id)
                ->where('status', 'active')
                ->latest()
                ->first();
        } else {
            // Check for a direct rollout for the device
            $rollout = Rollout::where('device_id', $device->id)
                ->where('status', 'active')
                ->latest()
                ->first();
        }

        // If no rollout found, return no update
        if (!$rollout) {
            return response()->json([
                'update_available' => false,
            ]);
        }

        // Get the associated firmware update ID
        $firmwareUpdateId = $rollout->firmware_update_id;

        // Return the update information with the next API call
        return response()->json([
            'update_available' => true,
            'firmware_update_id' => $firmwareUpdateId,
            'get_update' => route('firmware.get-update', ['deviceSerial' => $deviceSerial, 'firmwareUpdateId' => $firmwareUpdateId]) // Provide the next API to call
        ]);
    }
}
