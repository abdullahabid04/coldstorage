<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use Illuminate\Support\Facades\Validator;

class AreaDeviceController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'area_id' => 'required|exists:areas,id',
            'device_id' => 'required|exists:devices,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()->first()], 422);
        }

        $area = Area::find($request->area_id);

        // Attach the device to the area
        $area->device()->sync($request->device_id);

        return response()->json(['success' => true, 'message' => 'Device linked to area successfully!']);
    }
}
