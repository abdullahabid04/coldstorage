<?php

use App\Http\Controllers\AreaController;
use App\Http\Controllers\ClientAreaController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ClientStoreController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\DeviceGroupController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\FirmwareController;
use App\Http\Controllers\FirmwareUpdateController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RolloutController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ClientUserController;
use App\Http\Controllers\ClientDeviceController;
use App\Http\Controllers\UpdateLogController;
use App\Http\Controllers\UpdateProgressController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('client')->as("client.")->group(function () {
    Route::resource('store-clients', ClientUserController::class);
    Route::resource('stores', ClientStoreController::class);
    Route::resource('areas', ClientAreaController::class);
    Route::resource('devices', ClientDeviceController::class);
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('/menus', MenuController::class);
    Route::put('/menus/status/{menu}', [MenuController::class, 'statusToggle'])->name('menus.toggle');
    Route::resource('/roles', RoleController::class);
    Route::post('/roles/role_menu_attachment', [RoleController::class, 'roleMenuAttachment'])->name('roles.role_menu_attachment');
    Route::post('/roles/role_menu_detachment', [RoleController::class, 'roleMenuDetachment'])->name('roles.role_menu_detachment');

    Route::resource('/users', UserController::class)->except(['show']);

    Route::put('/users/status/{user}', [UserController::class, 'statusToggle'])->name('users.status');
    Route::get('/users/profile/{user}', [UserController::class, 'profile'])->name('users.profile');

    Route::resource('/devices', DeviceController::class);
    Route::resource('/stores', StoreController::class);
    Route::resource('/areas', AreaController::class);

    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('/reports/download/{storeId}/{startDate}/{endDate}', [ReportController::class, 'download'])->name('reports.download');
    Route::get('/reports/{type}/{entityId}/{startDate}/{endDate}', [ReportController::class, 'show'])->name('reports.view');

    Route::get('/faq', [FaqController::class, 'index'])->name('faq');

    Route::resource('firmwares', FirmwareController::class)->except(['show']);
    Route::resource('firmware_updates', FirmwareUpdateController::class)->except(['show']);
    Route::resource('device_groups', DeviceGroupController::class)->except(['show']);
    Route::resource('rollouts', RolloutController::class)->except(['show']);
    Route::resource('update_progress', UpdateProgressController::class)->only(['index']);
    Route::resource('update_logs', UpdateLogController::class)->only(['index']);

    Route::get('/client', [ClientController::class, 'index'])->name('client.index');
});
