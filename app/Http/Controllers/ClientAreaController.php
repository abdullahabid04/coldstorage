<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Store;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ClientAreaController extends Controller
{
    //
    public function index()
    {
        // Fetch stores that are mapped to the logged-in user
        $stores = Store::whereHas('users', function ($query) {
            $query->where('users.id', auth()->id());
        })->get();

        // Initialize an empty collection to store all areas
        $allAreas = collect();

        // Loop through each store to get its associated areas
        foreach ($stores as $store) {
            $areas = $store->areas; // Assuming a hasMany relationship between Store and Area
            $allAreas = $allAreas->merge($areas); // Merge areas into the collection
        }

        // Check if areas are found, otherwise show a message
        if ($allAreas->isEmpty()) {
            return redirect()->route('store-owner.dashboard')->with('error', 'No areas found for the stores in your account.');
        }

        // Pass the areas collection to the view
        $areas = $allAreas;
        return view('client.areas.index', compact('areas'));
    }

    public function rename(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $area = Area::findOrFail($id);
        $area->title = $request->input('title');
        $area->save();

        return response()->json(['success' => true, 'message' => 'Area renamed successfully']);
    }
}
