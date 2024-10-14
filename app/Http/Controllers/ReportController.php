<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Store;
use App\Services\SensorDataService;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    protected SensorDataService $sensorDataService;

    public function __construct(SensorDataService $sensorDataService)
    {
        $this->sensorDataService = $sensorDataService;
    }

    public function index(Request $request) {
        $stores = getAuthUserStores();

        $reportData = null;

        $areaId = $request->get('area', null);
        $timeRange = $request->get('time_range', null);


        if ($areaId && $timeRange) {
            [$startDate, $endDate] = explode(' to ', $timeRange);

            $endDate = Carbon::createFromFormat('d/m/y', trim($endDate))->endOfDay();
            $startDate = Carbon::createFromFormat('d/m/y', trim($startDate))->startOfDay();

            $reportData = $this->getReportData($areaId, $startDate, $endDate);
        } else{
            $startDate = null;
            $endDate = null;
        }

        return view('reports.index', compact('stores', 'reportData', 'areaId', 'startDate', 'endDate'));
    }

    public function getReportData(int $areaId, $startDate, $endDate) {
        if (!($areaId && $startDate && $endDate)) {
            return null;
        }

        return $this->sensorDataService->fetchDataForReport($areaId, $startDate, $endDate);
    }

    public function download($areaId, $startDate, $endDate) {
        $creation_date = Carbon::now();
        $user = Auth::user();
        $reportPeriod = $startDate . ' to ' . $endDate;
        $area = Area::find($areaId);
        $reportData = $this->getReportData($area->id, $startDate, $endDate);

        $pdf = Pdf::loadView('reports.download', compact('reportData', 'area', 'creation_date', 'reportPeriod', 'user'));

        $filename = "report_" . $area->title . "_" . $creation_date->format('YmdHis') . ".pdf";

        return $pdf->download($filename);
    }
}
