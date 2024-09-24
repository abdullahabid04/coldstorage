<?php

use App\Http\Controllers\API\ClientDataController;
use App\Http\Controllers\AreaDeviceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FactoryController;
use App\Http\Controllers\FactoryUserController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SensorDataController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\StoreUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/stores', [ClientDataController::class, 'getStores']);
    Route::get('/store-areas/{storeId}', [ClientDataController::class, 'getAreasInStore']);
    Route::get('/area-devices/{areaId}', [ClientDataController::class, 'getDevicesInArea']);
});

Route::post('/sensor-data/store', [SensorDataController::class, 'storeSensorData']);
Route::get('/sensor-data/humidity', [SensorDataController::class, 'fetchHumidity']);
Route::get('/sensor-data/temperature', [SensorDataController::class, 'fetchTemperature']);
Route::get('/sensor-data/{areaId}/{deviceId}', [SensorDataController::class, 'fetchData']);
Route::get('/sensor-data/{areaId}/{deviceId}/avg', [SensorDataController::class, 'fetchData']);

Route::get('/factories', [FactoryController::class, 'fetch']);
Route::get('/areas', [SiteController::class, 'fetch']);

Route::post('/factory-users', [FactoryUserController::class, 'store'])->name('api.factory-users.store');
Route::post('/store-users', [StoreUserController::class, 'store'])->name('api.store-users.store');
Route::post('/store-devices', [AreaDeviceController::class, 'store'])->name('api.store-devices.store');

Route::get('factory/{factoryId}/{type}', [FactoryController::class, 'fetchData']);
Route::get('site/{siteId}/{type}', [SiteController::class, 'fetchData']);
Route::get('sensor-data/{entityType}/{entityId}/', [SensorDataController::class, 'fetch']);
Route::get('sensor-data/{entityType}/{entityId}/energy', [SensorDataController::class, 'fetchEnergyData']);

Route::get('/roles/attach_menus/{role}', [RoleController::class, 'attachModalBody']);
Route::get('/roles/detach_menus/{role}', [RoleController::class, 'detachModalBody']);
Route::post('/menus/update_order', [MenuController::class, 'updateOrder']);
