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
    public function show(Area $area)
    {
        if (in_array(Auth::user()->role->id, [1, 2])) {
            return view('admin.area.show', compact('area'));
        }

        if ($area->device !== null) {
            $device = $area->device->first();
        } else return redirect()->back();

        $chartData = $this->sensorDataService->fetchData($area->id, $device->id, false, false, '1d', orderByDirection: 'asc');

        $avgData = [
            '1d' => $this->sensorDataService->fetchAvgData($area->id, $device->id, false, '1d'),
            '1w' => $this->sensorDataService->fetchAvgData($area->id, $device->id, false, '1w'),
            '1m' => $this->sensorDataService->fetchAvgData($area->id, $device->id, false, '1m'),
            '1y' => $this->sensorDataService->fetchAvgData($area->id, $device->id, false, '1y'),
            'all' => $this->sensorDataService->fetchAvgData($area->id, $device->id, false),
        ];

        return view('store_client.area.show', compact('area', 'chartData', 'avgData'));
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
