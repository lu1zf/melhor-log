<?php

use App\Http\Controllers\LogController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::prefix('/report')->group(function(){
    Route::get('/consumer', [LogController::class, 'exportLogsByConsumerId'])->name('consumer');
    Route::get('/service', [LogController::class, 'exportLogsByServiceId'])->name('service');
    Route::get('/latencies', [LogController::class, 'exportAverageLatenciesByService'])->name('latencies');
});
