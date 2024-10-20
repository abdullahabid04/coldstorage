<?php

use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

if (!function_exists('mapTimeframe')) {
    function mapTimeframe(string $startDate): Carbon|string|null
    {
        if ($startDate && $startDate !== 'all') {
            $startDate = match ($startDate) {
                '1h' => Carbon::now()->subHours(1),
                '1d' => Carbon::now()->subDay(),
                '1w' => Carbon::now()->subWeek(),
                '1m' => Carbon::now()->subMonth(),
                '1y' => Carbon::now()->subYear(),
                default => null,
            };
        }
        return $startDate;
    }
}

if (!function_exists('convertToLastNDays')) {
    function convertToLastNDays($startDate, $endDate): array
    {
        $start = Carbon::parse($startDate);
        $end = Carbon::parse($endDate);

        $differenceInDays = $start->diffInDays($end);

        $relativeString = $differenceInDays == 1 ? "last 1 day" : "last {$differenceInDays} days";

        return [
            'relativeString' => $relativeString,
            'days' => $differenceInDays
        ];
    }
}

if (!function_exists('getAuthStores')) {
    function getAuthStores(): Collection
    {
        if (Auth::user()->role->id === 4) {
            $stores = auth()->user()->stores()->with(['areas' => function ($query) {
                $query->whereHas('users', function ($query) {
                    $query->where('user_id', auth()->id());
                });
            }])->get();
        } else {
            $stores = auth()->user()->stores()->with('areas')->get();
        }

        return $stores;
    }
}

if (!function_exists('getAuthAreas')) {
    function getAuthAreas(): Collection
    {
        $stores = getAuthStores();
        return $stores->flatMap(function ($store) {
            return $store->areas;
        });
    }
}

if (!function_exists('isAuthStore')) {
    function isAuthStore(int $storeId): bool
    {
        $stores = getAuthStores();
        $store = $stores->find($storeId)->count();
        return $store === 1;
    }
}

if (!function_exists('isAuthArea')) {
    function isAuthArea(int $areaId): bool
    {
        $areas = getAuthStores();
        $area = $areas->find($areaId)->count();
        return $area === 1;
    }
}
