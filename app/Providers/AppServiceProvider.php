<?php

namespace App\Providers;

use App\Http\Controllers\ExchangeRatesController;
use App\Http\Controllers\YandexWeatherController;
use Illuminate\Pagination\Paginator;
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
        View::share(['course' => ExchangeRatesController::shareCourse()]);
        View::share(['weather' => YandexWeatherController::shareWeather()]);
    }
}
