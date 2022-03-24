<?php

namespace App\Providers;

use App\Models\SiteInformation;
use Illuminate\Support\ServiceProvider;
use View;

class GlobalSiteInformationProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            $site_info = SiteInformation::first();
            $view->with('site_info', $site_info);
        });
    }
}
