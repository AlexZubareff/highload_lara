<?php

namespace App\Providers;

use App\Services\QuickSort;
use App\services\QuickSortInterface;
use Illuminate\Support\ServiceProvider;
use Monolog\Logger;
use Psr\log\LoggerInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application Services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(LoggerInterface::class, function ($app){
            return new Logger('lara_logger');
        });
        $this->app->bind(QuickSortInterface::class, QuickSort::class);
    }

    /**
     * Bootstrap any application Services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
