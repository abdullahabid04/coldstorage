<?php

namespace App\Providers;

use App\Models\Store;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades;
use Illuminate\View\View;

class TopbarServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Facades\View::composer('layouts.partial.topbar', function (View $view) {
            if (Auth::user()->role->id === 4) {
                $stores = auth()->user()->stores()->with(['areas' => function ($query) {
                    $query->whereHas('users', function ($query) {
                        $query->where('user_id', auth()->id());
                    });
                }])->get();
            } else {
                $stores = auth()->user()->stores()->with('areas')->get();
            }

            $view->with('stores', $stores);
        });
    }
}
