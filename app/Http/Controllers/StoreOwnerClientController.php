<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;

class StoreOwnerClientController extends Controller
{
    // (Optional) List all clients for the store owner
    public function index()
    {
        // Fetch the store of the logged-in store owner
        $store = auth()->user()->stores()->first();

        if (!$store) {
            return redirect()->route('client.users.index')->with('error', 'No store associated with this user.');
        }

        // Fetch all clients associated with this store
        $clients = User::whereHas('stores', function ($query) use ($store) {
            $query->where('store_user.store_id', $store->id); // Specify table alias for store_id
        })->where('role_id', 4) // Assuming role_id 4 is for clients
        ->get();

        return view('client.users.index', compact('clients'));
    }


    // Show the form to create a new client
    public function create()
    {
        // Fetch the store of the logged-in store owner
        $store = auth()->user()->stores()->first();

        if (!$store) {
            return redirect()->route('store-owner.clients.index')->with('error', 'No store associated with this user.');
        }

        // Fetch all clients associated with this store
        $clients = User::whereHas('stores', function ($query) use ($store) {
            $query->where('store_user.store_id', $store->id); // Specify table alias for store_id
        })->where('role_id', 4)
            ->get();

        return view('store_owner.clients.index', compact('clients'));
    }

    // Store the newly created client
    public function store(Request $request)
    {
        // Validate the incoming data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'device_ids' => 'required|array',
            'device_ids.*' => 'exists:devices,id',
        ]);

        // Create the client user with the fixed role of "client"
        $client = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => 4, // Assign client role (fixed)
        ]);

        // Assign selected devices to the newly created client
        $client->devices()->sync($request->device_ids);

        return redirect()->route('client.store-clients.index')->with('success', 'Client created and devices assigned successfully.');
    }
}
