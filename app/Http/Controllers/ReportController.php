<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Store;
use App\Services\SensorDataService;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ReportController extends Controller
{
    protected SensorDataService $sensorDataService;

    public function __construct(SensorDataService $sensorDataService)
    {
        $this->sensorDataService = $sensorDataService;
    }

    public function index(Request $request)
    {
        $stores = getAuthStores();
        $areas = getAuthAreas();

        $type = $request->get('type', 'store');
        $entity = $request->get('entity', null);
        $timeRange = $request->get('time_range', null);

        $validator = Validator::make($request->all(), [
            'time_range' => ['nullable', 'regex:/^\d{2}\/\d{2}\/\d{2}\s+to\s+\d{2}\/\d{2}\/\d{2}$/']
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if ($timeRange && $entity) {
            try {
                [$startDate, $endDate] = explode('to', $timeRange);
                $startDate = Carbon::createFromFormat('d/m/y', trim($startDate))->startOfDay();
                $endDate = Carbon::createFromFormat('d/m/y', trim($endDate))->endOfDay();

                if ($startDate->gt($endDate)) {
                    return back()->withErrors(['time_range' => 'Start date cannot be after end date.'])->withInput();
                }

                $entity = $this->getEntity($type, $entity);
                $data = $this->sensorDataService->fetchDataForReport($type, $entity, $startDate, $endDate);
            } catch (\Exception $e) {
                return back()->withErrors(['time_range' => 'Invalid date format.'])->withInput();
            }
        } else {
            $data = null;
            $startDate = null;
            $endDate = null;
        }

        return view('reports.index', compact('stores', 'areas', 'entity', 'data', 'startDate', 'endDate', 'type'));
    }

    public function getReportData(string $type, $entity, $startDate, $endDate)
    {
        return $this->sensorDataService->fetchDataForReport($type, $entity, $startDate, $endDate);
    }

    public function download($areaId, $startDate, $endDate)
    {
        $pdf = Pdf::loadView('reports.download');

        return $pdf->download();
    }

    public function show(
        string $type,
        $entityId,
        $startDate,
        $endDate
    ) {
        $entity = $this->getEntity($type, $entityId);
        $pubDate = Carbon::now()->format("d/m/Y g:i a");
        $startDate = Carbon::parse($startDate)->format("d/m/Y");
        $endDate = Carbon::parse($endDate)->format("d/m/Y");

        $report = Pdf::loadView('reports.download', compact('entity', 'startDate', 'endDate', 'pubDate', 'type'));

        return $report->stream();
    }

    private function getEntity(string $entity, $entityId): Store|Area|null
    {
        return $entity === 'store' ? getAuthStores()->find($entityId) : getAuthAreas()->find($entityId);
    }
}
