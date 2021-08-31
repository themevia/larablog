<?php

use Carbon\Carbon;

if (! function_exists('by_month_count')) {

    function by_month_count(array $array, string $key = 'updated_at') {
        $by_month = [];
        foreach ($array as $item) {
            $month = Carbon::parse($item[$key])->format('M');
            if (isset($by_month[$month])) {
                $by_month[$month]++;
            } else {
                $by_month[$month] = 1;
            }
        }
        return $by_month;
    }
}
