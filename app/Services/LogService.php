<?php

namespace App\Services;
use App\Models\Log;

class LogService
{
    public function getRequestsByConsumerId(){
        $requests = Log::select([
            'log->request as request',
            'log->authenticated_entity->consumer_id->uuid as consumer_id'
        ])->get();

        $groupedRequests = $requests->groupBy('consumer_id');
        $countedRequests = $groupedRequests->map(function ($log){
            return $log->count();
        });

        return $countedRequests;
    }
}
