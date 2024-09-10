<?php

use App\Http\Controllers\DataFileController;
use App\Http\Controllers\FactoryController;
use App\Http\Controllers\FactoryUserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SensorDataController;
use App\Http\Controllers\SiteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BinFileController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/sensor-data/store', [SensorDataController::class, 'storeSensorData']);
Route::get('/sensor-data/humidity', [SensorDataController::class, 'fetchHumidity']);
Route::get('/sensor-data/temperature', [SensorDataController::class, 'fetchTemperature']);
Route::get('/sensor-data/{deviceId}', [SensorDataController::class, 'fetchData']);
