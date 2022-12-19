<?php

namespace App\Services;
use App\Models\Log;
use Illuminate\Support\Collection;

class LogService
{
    public function getRequestsByConsumerId(){
        $requests = Log::select([
            'log->request as request',
            'log->authenticated_entity->consumer_id->uuid as consumer_id'
        ])->get();

        return $this->groupAndCount($requests, 'consumer_id');
    }

    public function getRequestsByServiceId()
    {
        $requests = Log::select([
            'log->request as request',
            'log->service->id as service_id'
        ])->get();

        return $this->groupAndCount($requests, 'service_id');
    }

    public function getAverageLatenciesByService(): Collection
    {
        $logs = Log::select([
            'log->latencies->proxy as proxy',
            'log->latencies->kong as kong',
            'log->latencies->request as request',
            'log->service->id as service_id'
        ])->get();

        return $this->groupAndCalculateAverage($logs, 'service_id');
    }

    private function groupAndCount(Collection $data, $groupBy) : Collection
    {
        $grouped = $data->groupBy($groupBy);
        $countedGroup = $grouped->map(function($row){
           return $row->count();
        });

        return $countedGroup;
    }

    private function groupAndCalculateAverage(Collection $data, $groupBy) : Collection
    {
        $grouped = $data->groupBy($groupBy);

        $mapped = $grouped->map(function ($log){
            return [
                'kong' => $log->avg('kong'),
                'proxy' => $log->avg('proxy'),
                'request' => $log->avg('request')
            ];
        });

        return $mapped;
    }
}
