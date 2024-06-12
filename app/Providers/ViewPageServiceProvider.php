<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Setting;
use App\Models\SiteContent;
use Illuminate\Support\ServiceProvider;

class ViewPageServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        view()->composer('front.header', function ($view) {
            $view->with('category', Category::select('id', 'name')->get());
            $view->with('setting', Setting::select('logo', 'favicon')->first());

        });
        view()->composer('front.footer', function ($view) {
            $view->with('setting', Setting::first());
            $view->with('newsletter', SiteContent::select('content')->where('name', 'newsletter')->first());
            $view->with('logo_footer', SiteContent::select('content')->where('name', 'logo_footer')->first());

        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
