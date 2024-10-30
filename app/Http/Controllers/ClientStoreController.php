<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;

class ClientStoreController extends Controller
{
    //
    public function index()
    {
        // Fetch stores that are mapped to the logged-in user
        $stores = Store::whereHas('users', function ($query) {
            $query->where('users.id', auth()->id()); // Ensure stores are related to the current user
        })->get();

        // Check if stores are found, otherwise show a message
//        if ($stores->isEmpty()) {
//            return redirect()->route('client.dashboard')->with('error', 'No stores found for your account.');
//        }

        // Return the stores to the view
        return view('client.stores.index', compact('stores'));
    }
}
