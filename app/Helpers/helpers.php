<?php

use Carbon\Carbon;

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
