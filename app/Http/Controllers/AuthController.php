<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 400);
        }

        // Validate login credentials
        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid credentials'
            ], 401);
        }

        // Retrieve the authenticated user
        $user = Auth::user();

        // Check if the user is a client (e.g., role_id = 3 for clients)
        if ($user->role_id != 4) { // '3' is the role ID for 'client'
            return response()->json([
                'success' => false,
                'message' => 'Only clients can log in via API'
            ], 403); // Forbidden
        }

        // Create the token for the user
        $token = $user->createToken('API Token')->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => 'Login successful',
            'token' => $token,
            'user' => $user->makeHidden(['devices']),
            'devices' => $user->devices()->pluck('devices.id')
        ], 200);
    }
}
