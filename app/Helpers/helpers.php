<?php

use Carbon\Carbon;

if (!function_exists('mapTimeframe')) {
    function mapTimeframe(string $startDate)
    {
        if ($startDate && $startDate !== 'all') {
            switch ($startDate) {
                case '1d':
                    $startDate = Carbon::now()->subDay();
                    break;
                case '1w':
                    $startDate = Carbon::now()->subWeek();
                    break;
                case '1m':
                    $startDate = Carbon::now()->subMonth();
                    break;
                case '1y':
                    $startDate = Carbon::now()->subYear();
                    break;
                default:
                    $startDate = null;
                    break;
            }
        }
        return $startDate;
    }
}
