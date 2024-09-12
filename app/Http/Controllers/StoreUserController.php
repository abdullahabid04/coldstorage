<?php

namespace App\Http\Controllers;

use App\Models\StoreUser;
use Illuminate\Http\Request;

class StoreUserController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'store_id' => 'required|exists:stores,id',
            'user_id' => 'required|exists:users,id',
            'access_level' => 'required|in:owner,employee',
        ]);

        StoreUser::create([
            'store_id' => $request->store_id,
            'user_id' => $request->user_id,
            'access_level' => $request->access_level,
        ]);

        return response()->json(['success' => true, 'message' => 'User linked successfully!']);
    }
}
