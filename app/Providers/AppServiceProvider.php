<?php

namespace App\Providers;

use App\Models\Ad;
use App\Models\Video;
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
        view()->composer('ads.includes.blog-page',function (View $view){
            $view->with('ads',Ad::query()->typeAnnuncioImmagine()->whereGroup(Ad::GROUP_BLOG_PAGE)->get());
        });
        view()->composer('ads.includes.dblog-title',function (View $view){
            $view->with('ads',Ad::query()->typeAnnuncioImmagine()->whereGroup(Ad::GROUP_DBLOG_TITLE)->get());
        });
        view()->composer('ads.includes.dblog-author',function (View $view){
            $view->with('ads',Ad::query()->typeAnnuncioImmagine()->whereGroup(Ad::GROUP_DBLOG_AUTHOR)->get());
        });
        view()->composer('ads.includes.dblog-P1',function (View $view){
            $view->with('ads',Ad::query()->typeAnnuncioImmagine()->whereGroup(Ad::GROUP_DBLOG_P1)->first());
        });

        view()->composer('ads.includes.background-page',function (View $view){
            $view->with('ad',Ad::query()->typeAnnuncioImmagine()->whereGroup(Ad::GROUP_BACKGROUND_PAGE)->first());
        });
        view()->composer('ads.includes.adsdiretta',function (View $view){
            $view->with('ad',Ad::query()->typeAnnuncioImmagine()->whereGroup(Ad::GROUP_diretta_1)->first());
        });
        view()->composer('ads.includes.adsense',function (View $view){
            $view->with('ad',Ad::query()->typeAnnuncioImmagine()->whereGroup(Ad::Google_adsense)->first());
        });
        view()->composer('videos.includes.adsvideo',function (View $view){
            $view->with('video',Video::query()->first());
        });
    }
}
