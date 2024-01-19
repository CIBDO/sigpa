<?php

namespace App\Traits;

trait DateFilterTrait
{
    public function applyDateFilter($query, $start_date, $end_date, $date_field)
    {
        if ($start_date && $end_date) {
            $query->whereBetween($date_field, [$start_date, $end_date]);
        }

        return $query;
    }
}
