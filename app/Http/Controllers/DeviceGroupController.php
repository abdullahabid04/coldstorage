<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\DeviceGroup;
use App\Models\FirmwareUpdate;
use Illuminate\Http\Request;

class DeviceGroupController extends Controller
{
    //
    public function index()
    {
        // Fetch all device groups with their devices
        $groups = DeviceGroup::with('devices')->get();

        return view('admin.ota_updates.device_groups.index', compact('groups'));
    }

    public function create()
    {
        // Fetch devices that are not assigned to any group
        $devices = Device::whereDoesntHave('deviceGroups')->get();

        return view('admin.ota_updates.device_groups.create', compact('devices'));
    }

    public function edit(DeviceGroup $deviceGroup)
    {
        // Fetch all devices for the selection
        $devices = Device::all();

        return view('admin.ota_updates.device_groups.edit', compact('deviceGroup', 'devices'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'devices' => 'required|array',
        ]);

        // Create the device group
        $group = DeviceGroup::create($request->only('name'));
        $group->devices()->attach($request->input('devices')); // Attach devices to the group

        return redirect()->route('device_groups.index')->with('success', 'Device group created successfully.');
    }

    public function update(Request $request, DeviceGroup $deviceGroup)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'devices' => 'required|array',
        ]);

        // Update the device group
        $deviceGroup->update($request->only('name'));
        $deviceGroup->devices()->sync($request->input('devices')); // Sync devices in the group

        return redirect()->route('device_groups.index')->with('success', 'Device group updated successfully.');
    }

    public function destroy(DeviceGroup $deviceGroup)
    {
        // Delete the device group
        $deviceGroup->delete();

        return redirect()->route('device_groups.index')->with('success', 'Device group deleted successfully.');
    }

    // Batch OTA update for group
    public function batchUpdate(Request $request, $id)
    {
        $group = DeviceGroup::findOrFail($id);
        $firmwareVersion = FirmwareUpdate::findOrFail($request->input('firmware_update_id'));

        // Logic to initiate OTA update for each device in the group
        foreach ($group->devices as $device) {
            // Here you can trigger the OTA update process (e.g., notify each device about the new firmware)
            // Simulate OTA update: $this->initiateOTAUpdate($device, $firmwareVersion);
        }

        return response()->json([
            'message' => 'Batch OTA update initiated for group: ' . $group->name,
        ]);
    }
}
