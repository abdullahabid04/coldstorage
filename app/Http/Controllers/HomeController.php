<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Services\SensorDataService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    protected SensorDataService $sensorDataService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->sensorDataService = new SensorDataService();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request): Renderable
    {
        if (Auth::user()) {
            if (in_array(Auth::user()->role->id, [1, 2])) {
                return view('dashboard.admin');
            } else if (Auth::user()->role->id == 4) {
                return view('dashboard.client');
            } else {
                $stores = Store::with('devices')->get();

                foreach ($stores as $store) {
                    foreach ($store->devices as $device) {
                        $device->latestRecord = $this->sensorDataService->fetchData($device->id, false);
                    }
                }

                return view('dashboard.client', compact('stores'));
            }
        } else {
            return redirect()->route('login');
        }
    }
}
