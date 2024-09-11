<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\Device;

class StoreOwnerDeviceController extends Controller
{
    // List all devices for the store owned by the logged-in store owner
    public function index()
    {
        // Fetch the store of the logged-in store owner
        $store = Store::whereHas('users', function ($query) {
            $query->where('id', auth()->id()); // Match the logged-in user
        })->first();

        if (!$store) {
            return redirect()->route('store-owner.dashboard')->with('error', 'No store found for this user.');
        }

        // Fetch devices that belong to this store
        $devices = $store->devices()->get();

        return view('store_owner.devices.index', compact('devices'));
    }
}
