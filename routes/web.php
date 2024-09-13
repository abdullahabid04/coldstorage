<?php

use App\Http\Controllers\AreaController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\StoreOwnerClientController;
use App\Http\Controllers\StoreOwnerDeviceController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('client')->group(function () {
    Route::get('/create', [StoreOwnerClientController::class, 'create'])->name('store-clients.create');
    Route::post('/', [StoreOwnerClientController::class, 'store'])->name('store-clients.store');
    Route::get('/', [StoreOwnerClientController::class, 'index'])->name('store-clients.index');

    Route::get('/devices', [StoreOwnerDeviceController::class, 'index'])->name('devices.index');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::resource('/users', UserController::class)->except(['show']);

    Route::put('/users/status/{user}', [UserController::class, 'statusToggle'])->name('users.status');
    Route::get('/users/profile/{user}', [UserController::class, 'profile'])->name('users.profile');

    Route::resource('/devices', DeviceController::class);
    Route::resource('/stores', StoreController::class);
    Route::resource('/areas', AreaController::class);

    Route::resource('/roles', RoleController::class);
    Route::post('/roles/role_menu_attachment', [RoleController::class, 'roleMenuAttachment'])->name('roles.role_menu_attachment');
    Route::post('/roles/role_menu_detachment', [RoleController::class, 'roleMenuDetachment'])->name('roles.role_menu_detachment');

    Route::resource('/menus', MenuController::class);
    Route::put('/menus/{menu}', [MenuController::class, 'statusToggle'])->name('menus.toggle');

    Route::get('/reports', function () {
        return view('reports.index');
    })->name('reports');

    Route::get('/faq', [FaqController::class, 'index'])->name('faq');
});
