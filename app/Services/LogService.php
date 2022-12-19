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

    private function groupAndCount(Collection $data, $groupBy) : Collection
    {
        $grouped = $data->groupBy($groupBy);
        $countedGroup = $grouped->map(function($row){
           return $row->count();
        });

        return $countedGroup;
    }
}
