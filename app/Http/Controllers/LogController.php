<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\LogService;
class LogController extends Controller
{
    private LogService $logService;

    public function __construct()
    {
        $this->logService = new LogService();
    }

    public function exportLogsByConsumerId()
    {
        dd($this->logService->getRequestsByConsumerId());
    }

    public function exportLogsByServiceId()
    {
        dd($this->logService->getRequestsByServiceId());
    }

    public function exportAverageLatenciesByService()
    {
        dd($this->logService->getAverageLatenciesByService());
    }
}
