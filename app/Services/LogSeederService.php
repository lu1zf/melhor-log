<?php

namespace App\Services;
use App\Models\Log;
use ZipArchive;

class LogSeederService
{
    public function pupulateDatabase(): void
    {
        $logsContent = $this->readFromZip();
        $logs = $this->handleData($logsContent);
        $this->chunkAndStore($logs);
    }
    private function readFromZip() : string
    {
        $zip = new ZipArchive();
        $zip->open(storage_path() . "/logs.zip");
        return utf8_encode($zip->getFromName("logs.txt"));
    }
    private function handleData($logsContent) : array
    {
        $dataArray = preg_split('/\n/', $logsContent);

        $logs = [];

        foreach ($dataArray as $jsonString){
            if (empty($jsonString)) continue;

            $logs[] = [
                'log' => $jsonString,
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString()
            ];
        }

        return $logs;
    }
    private function chunkAndStore($logs): void
    {
        $chunks = array_chunk($logs, 5000);
        foreach ($chunks as $chunk){
            Log::insert($chunk);
        }
    }
}
