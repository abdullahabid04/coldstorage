<?php

use Carbon\Carbon;
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
    function convertToLastNDays($startDate, $endDate)
    {
        $start = Carbon::parse($startDate); // "2024-10-01 00:00:00" its a string like this does it work
        $end = Carbon::parse($endDate);

        $differenceInDays = $start->diffInDays($end);

        $relativeString = $differenceInDays == 1 ? "last 1 day" : "last {$differenceInDays} days";

        return [
            'relativeString' => $relativeString,
            'days' => $differenceInDays
        ];
    }
}

if (!function_exists('getAuthUserStores')) {
    function getAuthUserStores() {
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
