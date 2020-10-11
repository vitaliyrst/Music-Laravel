<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class YandexWeatherController extends Controller
{
    public static function shareWeather()
    {
        return Cache::remember('weather', 600, function () {
            return Http::withHeaders(['X-Yandex-API-Key' => env('YANDEX_API_KEY')])
                ->get('https://api.weather.yandex.ru/v2/forecast?lat=53.931311&lon=27.580276&lang=ru_RU&limit=1&hours=false')
                ->json();
        });
    }
}
