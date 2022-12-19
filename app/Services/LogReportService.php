<?php

namespace App\Services;

class LogReportService
{
    private LogService $logService;

    public function __construct(LogService $logService){
        $this->logService = $logService;
    }

    public function exportRequestsByConsumerId(){
        $header = ["consumer_id", "requests"];
        $requestsByConsumerId = $this->logService->getRequestsByConsumerId();

        $rows = [];

        foreach ($requestsByConsumerId as $key => $value){
            $rows[] = [
                'consumer_id' => $key,
                'requests' => $value,
            ];
        }
        $filepath = storage_path('consumerReport.csv');
        $this->putCsv($filepath, $header, $rows);
    }

    public function exportRequestsByServiceId()
    {
        $header = ["service_id", "requests"];
        $requestsByServiceId = $this->logService->getRequestsByServiceId();

        $rows = [];

        foreach ($requestsByServiceId as $key => $value){
            $rows[] = [
                'service_id' => $key,
                'requests' => $value,
            ];
        }
        $filepath = storage_path('serviceReport.csv');
        $this->putCsv($filepath, $header, $rows);
    }

    public function exportAverageLatenciesReport()
    {
        $header = ["service_id", "kong", "proxy", "request"];
        $avgLatenciesByServiceId = $this->logService->getAverageLatenciesByService();
        $rows = [];

        foreach ($avgLatenciesByServiceId as $key => $item){
            $rows[] = [
                'service_id' => $key,
                'kong' => $item['kong'],
                'proxy' => $item['proxy'],
                'request' => $item['request'],
            ];
        }

        $filepath = storage_path('avgLatenciesReport.csv');
        $this->putCsv($filepath, $header, $rows);
    }

    private function putCsv($filepath, $header, $rows)
    {
        $fp = fopen($filepath, "w");
        fputcsv($fp, $header);

        foreach ($rows as $row){
            fputcsv($fp, $row);
        }

        fclose($fp);
    }
}
