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
            $userId = Auth::id();

            if (in_array(Auth::user()->role->id, [1, 2])) {
                return view('dashboard.admin');
            } else if (Auth::user()->role->id == 3) {
//                $stores = Store::with('areas.device')->get();
                $stores = auth()->user()->stores('client')->get();

                foreach ($stores as $store) {
                    foreach ($store->areas as $area) {
                        $device = $area->device->first->id;
                        $area->latestRecord = $this->sensorDataService->fetchData($device->id, false);
                    }
                }

                return view('dashboard.store_client', compact('stores'));
            } else if (Auth::user()->role->id == 4) {
                $stores = auth()->user()->stores('owner')->get();

                foreach ($stores as $store) {
                    foreach ($store->areas as $area) {
                        $device = $area->device->first->id;
                        $area->latestRecord = $this->sensorDataService->fetchData($device->id, false);
                    }
                }

                return view('dashboard.client', compact('stores'));
            }
        } else {
            return redirect()->route('login');
        }
    }
}
