<?php

namespace App\Helpers;

use Carbon\Carbon;
use Illuminate\Support\Str;

class Utility
{
    public static function getBasename($data)
    {
        return Str::of($data)->basename();
    }

    /**
     * @return string
     */
    public static function greeting()
    {
        $now = Carbon::now();

        $morningStart = Carbon::createFromTimeString('06:00:00');
        $morningEnd = Carbon::createFromTimeString('11:59:59');

        $eveningStart = Carbon::createFromTimeString('12:00:00');
        $eveningEnd = Carbon::createFromTimeString('17:59:59');

        $nightStart = Carbon::createFromTimeString('18:00:00');
        $nightEnd = Carbon::createFromTimeString('05:59:59')->addDay();

        $greeting = '';

        if ($now->between($morningStart, $morningEnd)) {
            $greeting = 'Morning';
        } elseif ($now->between($eveningStart, $eveningEnd)) {
            $greeting = 'Afternoon';
        } elseif ($now->between($nightStart, $nightEnd)) {
            $greeting = 'Evening';
        } else {
            $greeting = 'Night';
        }

        return $greeting;
    }
}
