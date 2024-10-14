<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Firmware;
use App\Models\FirmwareDownloadToken;
use App\Models\FirmwareUpdate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FirmwareUpdateController extends Controller
{
    //
    public function index()
    {
        // Fetch all firmware updates
        $firmwareUpdates = FirmwareUpdate::all();

        return view('admin.ota_updates.firmware_updates.index', compact('firmwareUpdates'));
    }

    public function create()
    {
        $firmwares = Firmware::all();
        // Show the form to create a new firmware update
        return view('admin.ota_updates.firmware_updates.create', compact('firmwares'));
    }

    public function edit(FirmwareUpdate $firmwareUpdate)
    {
        $firmwares = Firmware::all();
        // Show the form to edit an existing firmware update
        return view('admin.ota_updates.firmware_updates.edit', compact('firmwareUpdate', 'firmwares'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'firmware_id' => 'required|exists:firmwares,id', // Firmware must exist in the firmwares table
            'name' => 'required|string|max:255',
            'compatible_models' => 'required|array',
            'min_version' => 'nullable|string',
            'max_version' => 'nullable|string',
        ]);

        // Create the firmware update record in the database
        FirmwareUpdate::create([
            'firmware_id' => $request->firmware_id,
            'name' => $request->name,
            'compatible_models' => json_encode($request->compatible_models), // Store as JSON
            'min_version' => $request->min_version,
            'max_version' => $request->max_version,
            'status' => 'inactive', // Default status
        ]);

        return redirect()->route('firmware_updates.index')->with('success', 'Firmware update created successfully.');
    }

    public function update(Request $request, FirmwareUpdate $firmwareUpdate)
    {
        // Validate the incoming request data
        $request->validate([
            'firmware_id' => 'required|exists:firmwares,id', // Firmware must exist in the firmwares table
            'name' => 'required|string|max:255',
            'compatible_models' => 'required|array',
            'min_version' => 'nullable|string',
            'max_version' => 'nullable|string',
        ]);

        // Update firmware update details
        $firmwareUpdate->firmware_id = $request->firmware_id;
        $firmwareUpdate->name = $request->name;
        $firmwareUpdate->compatible_models = json_encode($request->compatible_models); // Store as JSON
        $firmwareUpdate->min_version = $request->min_version;
        $firmwareUpdate->max_version = $request->max_version;

        // Save the changes
        $firmwareUpdate->save();

        return redirect()->route('firmware_updates.index')->with('success', 'Firmware update updated successfully.');
    }

    public function checkCompatibility(Request $request, $deviceSerial)
    {
        // Fetch the device
        $device = Device::where('serial_number', $deviceSerial)->first();

        if (!$device) {
            return response()->json(['error' => 'Device not found'], 404);
        }

        // Fetch the latest firmware version
        $firmware = FirmwareUpdate::latest()->first();

        if (!$firmware) {
            return response()->json(['error' => 'No firmware available'], 404);
        }

        // Check if the device model is compatible
        if (!in_array($device->model, $firmware->compatible_models)) {
            return response()->json([
                'error' => 'Device model is not compatible with this firmware',
                'compatible_models' => $firmware->compatible_models,
            ], 400);
        }

        // Check version constraints
        if ($firmware->min_version && version_compare($device->firmware_version, $firmware->min_version, '<')) {
            return response()->json([
                'error' => 'Device firmware version is too low for this update',
                'required_min_version' => $firmware->min_version,
            ], 400);
        }

        if ($firmware->max_version && version_compare($device->firmware_version, $firmware->max_version, '>')) {
            return response()->json([
                'error' => 'Device firmware version is too high for this update',
                'required_max_version' => $firmware->max_version,
            ], 400);
        }

        // If compatible, return success
        return response()->json([
            'message' => 'Device is compatible with the latest firmware',
            'firmware_version' => $firmware->version,
        ]);
    }

    public function activateVersion(Request $request, $id)
    {
        FirmwareUpdate::activateVersion($id);

        return response()->json([
            'message' => 'Firmware version activated successfully.',
            'active_version_id' => $id
        ], 200);
    }

    public function rollbackVersion(Request $request, $id)
    {
        FirmwareUpdate::rollbackToVersion($id);

        return response()->json([
            'message' => 'Rollback successful to version ' . $id,
        ], 200);
    }

    public function getFirmwareUpdate(Request $request, $deviceSerial, $firmwareUpdateId)
    {
        // Find the device by serial number
        $device = Device::where('serial_number', $deviceSerial)->firstOrFail();

        // Find the firmware update using the passed firmware_update_id
        $firmwareUpdate = FirmwareUpdate::find($firmwareUpdateId);

        if (!$firmwareUpdate) {
            return response()->json(['error' => 'Firmware not found'], 404);
        }

        // Create a new download token
        $downloadToken = FirmwareDownloadToken::create([
            'device_id' => $device->id,
            'used' => false,
            'token' => bin2hex(random_bytes(32)), // Generate a secure token
            'expires_at' => now()->addHours(24),  // Token valid for 24 hours
        ]);

        // Generate the firmware download URL dynamically
        $firmwareUrl = route('firmware.download', [
            'version' => $firmwareUpdate->firmware->version,
            'deviceSerial' => $device->serial_number,
            'token' => $downloadToken->token
        ]);

        return response()->json([
            'firmware_version' => $firmwareUpdate->firmware->version,
            'download_url' => $firmwareUrl,
            'download_token' => $downloadToken->token,
        ]);
    }
}
