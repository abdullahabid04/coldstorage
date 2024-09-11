<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\Device;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class StoreDeviceController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'store_id' => 'required|exists:stores,id',
            'device_ids' => 'required|array',
            'device_ids.*' => 'exists:devices,id'
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()->first()], 422);
        }

        $store = Store::find($request->store_id);

        // Attach the selected devices to the store, without detaching from others here
        foreach ($request->device_ids as $deviceId) {
            // First check if the device is already assigned to another store
            $existingAssignment = DB::table('store_device')->where('device_id', $deviceId)->first();

            if (!$existingAssignment) {
                $store->devices()->attach($deviceId);
            }
        }

        return response()->json(['success' => true, 'message' => 'Devices linked successfully!']);
    }
}
