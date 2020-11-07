<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class ExchangeRatesController extends Controller
{
    public static function shareCourse()
    {
        return Cache::remember('course', 600, function () {
            return Http::timeout(3)->get('https://www.nbrb.by/api/exrates/rates?periodicity=0')->json();
        });
    }
}
