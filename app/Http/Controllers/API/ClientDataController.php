<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientDataController extends Controller
{
    // Fetch stores mapped to the logged-in user through areas
    public function getStores(Request $request)
    {
        // Fetch the authenticated user
        $user = $request->user();

        // Fetch stores based on the user's mapped areas
        $stores = $user->areas()->with('store')->get()
            ->pluck('store')->unique('id');

        return response()->json([
            'success' => true,
            'stores' => $stores,
        ], 200);
    }

    // Fetch areas in a specific store
    public function getAreasInStore(Request $request, $storeId)
    {
        // Fetch the authenticated user
        $user = $request->user();

        // Fetch areas in the store mapped to the user
        $areas = $user->areas()->where('store_id', $storeId)->get()->unique('id');

        return response()->json([
            'success' => true,
            'areas' => $areas->makeHidden(['pivot']),
        ], 200);
    }

    // Fetch devices in a specific area
    public function getDevicesInArea(Request $request, $areaId)
    {
        // Fetch the authenticated user
        $user = $request->user();

        // Fetch devices mapped to the specific area through area-device relationship
        $devices = $user->areas()->where('areas.id', $areaId)->with('device')->get();

        return response()->json([
            'success' => true,
            'devices' => $devices,
        ], 200);
    }
}
