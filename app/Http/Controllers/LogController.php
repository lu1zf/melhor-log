<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\LogService;
use App\Services\LogReportService;

class LogController extends Controller
{
    private LogService $logService;
    private LogReportService $logReportService;

    public function __construct()
    {
        $this->logService = new LogService();
        $this->logReportService = new LogReportService($this->logService);
    }

    public function exportLogsByConsumerId()
    {
        $this->logReportService->exportRequestsByConsumerId();

        $filePath = storage_path('consumerReport.csv');
        return response()->download($filePath);
    }

    public function exportLogsByServiceId()
    {
        $this->logReportService->exportRequestsByServiceId();

        $filePath = storage_path('serviceReport.csv');
        return response()->download($filePath);
    }

    public function exportAverageLatenciesByService()
    {
        $this->logReportService->exportAverageLatenciesReport();

        $filePath = storage_path('avgLatenciesReport.csv');
        return response()->download($filePath);
    }
}
