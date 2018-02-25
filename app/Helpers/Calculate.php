<?php

use Carbon\Carbon;

if (!function_exists('payment_total')) {
    function payment_total($weight, $minimal, $nominal, $plus_45, $plus_100)
    {
        if ($weight > 0 && $weight <= 10) {
            return $minimal;
        } else if ($weight > 10 && $weight <= 45) {
            return $weight * $nominal;
        } else if ($weight > 45 && $weight <= 100) {
            return $weight * $plus_45;
        } else if ($weight > 100) {
            return $weight * $plus_100;
        } else {
            return 0;
        }
    }
}

if (!function_exists('payment_type')) {
    function payment_type($weight, $minimal, $nominal, $plus_45, $plus_100)
    {
        if ($weight > 0 && $weight <= 10) {
            return $minimal;
        } else if ($weight > 10 && $weight <= 45) {
            return $nominal;
        } else if ($weight > 45 && $weight <= 100) {
            return $plus_45;
        } else if ($weight > 100) {
            return $plus_100;
        } else {
            return 0;
        }
    }
}

if (!function_exists('order_number')) {
    function order_number()
    {
        $now = Carbon::now();
        return strtotime($now);
    }
}
