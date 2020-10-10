<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        View::share(['course' => $this->shareCourse()]);
        View::share(['weather' => $this->shareWeather()]);
    }

    public function shareCourse()
    {
        return Cache::remember('course', 600, function () {
            return Http::get('https://www.nbrb.by/api/exrates/rates?periodicity=0')->json();
        });
    }

    public function shareWeather()
    {
        return Cache::remember('weather', 600, function () {
            return Http::withHeaders(['X-Yandex-API-Key' => 'ef401ce0-f18c-4c8d-972e-4d3411332acc'])
                ->get('https://api.weather.yandex.ru/v2/forecast?lat=53.931311&lon=27.580276&lang=ru_RU&limit=1&hours=false')
                ->json();
        });

    }
}
