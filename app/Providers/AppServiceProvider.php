<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Auth;

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
        Schema::defaultStringLength(191);

        view()->composer([
            'layouts.navbars.sidebar'
        ], function($view) {
            $my_projects = \App\ProjectMembers::where('user_id', Auth::user()->id)->get();
            view()->share('my_projects', $my_projects);
        });
    }
}
