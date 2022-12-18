<?php

namespace Database\Seeders;

use App\Models\Log;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Services\LogSeederService;

class LogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(LogSeederService $logSeederService)
    {
        $logSeederService->pupulateDatabase();
    }
}
