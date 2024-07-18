<?php

namespace App\Providers;

use App\Models\Ad;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        set_time_limit(900); // Sets the maximum execution time to 15 minutes

        view()->composer('ads.includes.main-page',function (View $view){
            $view->with('ads',Ad::query()->typeAnnuncioImmagine()->whereGroup(Ad::GROUP_MAIN_PAGE)->get());
        });
        view()->composer('ads.includes.side-page',function (View $view){
            $view->with('ads',Ad::query()->typeAnnuncioImmagine()->whereGroup(Ad::GROUP_SIDE_PAGE)->get());
        });
    }
}
