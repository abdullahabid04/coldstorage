<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\Device;

class StoreOwnerDeviceController extends Controller
{
    // List all devices for the areas in the store owned by the logged-in store owner
    public function index()
    {
        // Fetch stores mapped to the logged-in user
        $stores = Store::whereHas('users', function ($query) {
            $query->where('users.id', auth()->id()); // Specify 'users.id' to avoid ambiguity
        })->get();

        // Initialize an empty collection to store all devices
        $allDevices = collect();

        // Loop through each store and get its associated areas and devices
        foreach ($stores as $store) {
            // For each store, get the areas
            $areas = $store->areas;

            // For each area, get the devices mapped to it and merge them into the collection
            foreach ($areas as $area) {
                $devices = $area->device; // Assuming one-to-one relation
                $allDevices = $allDevices->merge($devices);
            }
        }

        // Check if there are devices found, otherwise show a message
        if ($allDevices->isEmpty()) {
            return redirect()->route('store-owner.dashboard')->with('error', 'No devices found for the areas in your store.');
        }

        $devices = $allDevices;

        // Return devices to the view
        return view('client.devices.index', compact('devices'));
    }
}
