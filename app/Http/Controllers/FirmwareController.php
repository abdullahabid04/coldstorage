<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Firmware;
use App\Models\FirmwareDownloadToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FirmwareController extends Controller
{
    //
    public function index()
    {
        $firmwares = Firmware::all();

        return view('admin.ota_updates.firmwares.index', compact('firmwares'));
    }

    public function create(Request $request)
    {
        return view('admin.ota_updates.firmwares.create');
    }

    public function edit(Request $request, Firmware $firmware)
    {
        return view('admin.ota_updates.firmwares.edit', compact('firmware'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'version' => 'required|string|unique:firmwares',
            'firmware_file' => 'required|file|mimes:bin|max:50000',
        ]);

        // Save the uploaded firmware file
        $path = $request->file('firmware_file')->store('firmwares');

        // Calculate the checksum
        $fileContents = Storage::get($path);
        $checksum = hash('sha256', $fileContents);

        // Save firmware details in the database
        $firmware = Firmware::create([
            'version' => $request->version,
            'file_path' => $path,
            'checksum' => $checksum,
        ]);

        return redirect()->route('firmwares.index')->with('success', 'Firmware updated successfully');
    }

    public function update(Request $request, Firmware $firmware)
    {
        $request->validate([
            'version' => 'required|string|unique:firmwares,version,' . $firmware->id,
            'firmware_file' => 'nullable|file|mimes:bin|max:50000',
        ]);

        // Check if a new firmware file is uploaded
        if ($request->hasFile('firmware_file')) {
            // Delete the old firmware file
            if (Storage::exists($firmware->file_path)) {
                Storage::delete($firmware->file_path);
            }

            // Save the new firmware file
            $path = $request->file('firmware_file')->store('firmwares');

            // Calculate the checksum of the new file
            $fileContents = Storage::get($path);
            $checksum = hash('sha256', $fileContents);

            // Update the file path and checksum
            $firmware->file_path = $path;
            $firmware->checksum = $checksum;
        }

        // Update the firmware version
        $firmware->version = $request->version;

        // Save the changes
        $firmware->save();

        return redirect()->route('firmwares.index')->with('success', 'Firmware updated successfully');
    }

    public function downloadFirmware(Request $request, $version, $deviceSerial, $token)
    {
        // Find the device
        $device = Device::where('serial_number', $deviceSerial)->firstOrFail();

        // Validate the token
        $tokenRecord = FirmwareDownloadToken::where('token', $token)
            ->where('device_id', $device->id)
            ->where('expires_at', '>', now())
            ->first();

        if (!$tokenRecord) {
            return response()->json(['error' => 'Invalid or expired token'], 403);
        }

        // Find the firmware by version
        $firmware = Firmware::where('version', $version)->firstOrFail();

        // Check if the firmware file exists
        if (!Storage::exists($firmware->file_path)) {
            return response()->json(['error' => 'Firmware file not found'], 404);
        }

        // Serve the firmware file for download
        return Storage::download($firmware->file_path, basename($firmware->file_path));
    }

    public function storeChecksum(Request $request)
    {
        $request->validate([
            'version' => 'required|string|unique:firmwares',
            'firmware_file' => 'required|file|mimes:bin|max:50000',
        ]);

        // Save the uploaded firmware file
        $path = $request->file('firmware_file')->store('firmwares');

        // Calculate the checksum (SHA-256) of the firmware file
        $fileContents = Storage::get($path);
        $checksum = hash('sha256', $fileContents);

        // Save firmware details in the database
        $firmware = Firmware::create([
            'version' => $request->version,
            'file_path' => $path,
            'checksum' => $checksum,
        ]);

        return response()->json(['message' => 'Firmware uploaded successfully', 'checksum' => $checksum]);
    }

    public function getChecksum(Request $request, $deviceSerial)
    {
        // Find the latest firmware version
        $firmware = Firmware::latest()->first();

        if (!$firmware) {
            return response()->json(['error' => 'No firmware available'], 404);
        }

        return response()->json([
            'message' => 'Firmware checksum fetched successfully',
            'checksum' => $firmware->checksum,
            'version' => $firmware->version,
        ]);
    }
}
