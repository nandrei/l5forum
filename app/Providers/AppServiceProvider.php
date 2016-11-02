<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//        \View::composer('*', function($view)
//        {
//            $navlinks = session()->get('navlinks');
//            $view->with('navlinks', $navlinks);
//            //dd(compact('navlinks'));
//        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
