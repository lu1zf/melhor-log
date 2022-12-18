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
}
