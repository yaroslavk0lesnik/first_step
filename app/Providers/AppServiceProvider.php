<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Route;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()

    {
        $locale = Session::get('locale', config('app.locale'));
        App::setLocale($locale);

    }



    /**
     * Register any application services.
     */
    public function register()
    {

    }
}
