<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TroopController extends Controller
{
    /**
     * @param Request $request
     */
    public function troopGenerator(Request $request)
    {
        $start = microtime(true);
        $maximum = $request->max;
        $units = $request->units;
        $error = '';
        $addends = [];
        $titles = [];

        for ($index = 0; $index < $units; $index++) {
            $titles[] = 'Unit ' . ($index + 1);
        }

        // Every troop MUST be > 0
        if ($maximum >= $units) {
            $n = $units;

            // To balance the chance of getting a higher number for each unit
            shuffle($titles);

            while ($n) {
                if (1 < $n--) {
                    /**
                     * Generates cryptographically secure pseudo-random integers
                     * @link https://php.net/manual/en/function.random-int.php
                     */
                    $addend = random_int(1, $maximum - $n);
                    $maximum -= $addend;
                    $addends[] = $addend;
                } else {
                    $addends[] = $maximum;
                }
            }
        } else {
            $error = 'Please choose a number >= ' . $units;
        }

        $period = (microtime(true) - $start) * 1000;
        return view('welcome', ["addends" => $addends, 'titles' => $titles, 'error' => $error, 'period' => $period]);
    }
}
