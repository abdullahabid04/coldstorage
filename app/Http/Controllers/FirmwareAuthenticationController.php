<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\FirmwareDownloadToken;
use Illuminate\Http\Request;

class FirmwareAuthenticationController extends Controller
{
    // Issue a download token when the device checks for a firmware update
    public function issueToken(Request $request, $deviceSerial)
    {
        // Find the device by serial number
        $device = Device::where('serial_number', $deviceSerial)->first();
        if (!$device) {
            return response()->json(['error' => 'Device not found'], 404);
        }

        // Generate a new token for the device
        $token = FirmwareDownloadToken::generateToken($device->id);

        return response()->json([
            'message' => 'Token generated successfully',
            'token' => $token->token,
            'expires_at' => $token->expires_at
        ]);
    }

    // Validate token before allowing firmware download
    public function validateToken(Request $request, $token)
    {
        // Find the token record
        $firmwareToken = FirmwareDownloadToken::where('token', $token)->first();

        // Validate if the token exists, has not expired, and has not been used
        if (!$firmwareToken || !$firmwareToken->isValid()) {
            return response()->json(['error' => 'Invalid or expired token'], 401);
        }

        // Mark the token as used after successful validation
        $firmwareToken->used = true;
        $firmwareToken->save();

        return response()->json(['message' => 'Token validated successfully']);
    }
}
