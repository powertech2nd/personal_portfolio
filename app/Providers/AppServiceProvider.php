<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\ViewComposers\TechStackComposer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Run laravel telescope only on local environment
        if ($this->app->environment('local')) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Change pagination view style
        Paginator::defaultView('vendor.pagination.core-ui');
        Paginator::defaultSimpleView('vendor.pagination.core-ui');

        View::composer(
            ['admin.techStacks.form'], TechStackComposer::class
        );
    }
}
