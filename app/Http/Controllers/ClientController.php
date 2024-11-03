<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $clients = User::where('role_id', 3)->get();

        if ($user->isSuperAdmin() or $user->isAdmin()) {
            return view('admin.client.index', compact('user', 'clients'));
        }
    }
}
