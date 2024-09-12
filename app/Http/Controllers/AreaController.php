<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Device;
use App\Models\Store;
use App\Services\SensorDataService;
use App\Services\SiteService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AreaController extends Controller
{
    protected SensorDataService $sensorDataService;

    public function __construct(SensorDataService $sensorDataService)
    {
        $this->sensorDataService = $sensorDataService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $areas = Area::with('store')->get();
        $devices = Device::all();
        return view('admin.areas.index', compact('areas', 'devices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $stores = Store::all();
        return view('admin.areas.create', compact('stores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'store_id' => 'required|exists:stores,id',
        ]);

        Area::create($request->all());

        return redirect()->route('areas.index')->with('success', 'Site created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Area $area)
    {
        if (in_array(Auth::user()->role->id, [1, 2])) {
            return view('admin.areas.show', compact('area'));
        }

        $type = 'energy';

        $area->energy = $this->fetchData($request, $area->id, $type, 'all', false);
        $area->e8h = $this->fetchData($request, $area->id, $type, '8h', false);
        $area->e1w = $this->fetchData($request, $area->id, $type, '1w', false);
        $area->e1m = $this->fetchData($request, $area->id, $type, '1m', false);

        return view('client.areas.show', compact('area'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Area $area)
    {
        $stores = Store::all();
        return view('admin.areas.edit', compact('area', 'stores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Area $area)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'store_id' => 'required|exists:stores,id',
        ]);

        $area->update($request->all());

        return redirect()->route('areas.index')->with('success', 'Site updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Area $area)
    {
        $area->delete();
        return redirect()->route('areas.index')->with('success', 'Site deleted successfully.');
    }

    public function fetch(Request $request)
    {
        if ($request->input('id')) {
            $data = Area::where('id', $request->input('id'))
                ->with(['components'])
                ->first();

            if ($data) return response()->json($data, 200);
            else return response()->json(['message' => 'Site is not registered in the system.'], 404);
        } else {
            $data = Area::with(['components'])
                ->get();

            if ($data) return response()->json($data, 200);
            else return response()->json(['message' => 'No areas registered in the system.'], 404);
        }
    }

    public function fetchData(Request $request, int $siteId, string $type, string $timeframe = 'all', bool $json = true, $precisionVal = 2)
    {
        return app(SiteService::class)->fetchData($request, $siteId, $type, $timeframe, $json, $precisionVal);
    }
}
