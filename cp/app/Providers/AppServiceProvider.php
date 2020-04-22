<?php

namespace App\Providers;

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
                /* Lecture 13 */
                $this->app->bind(\App\CP\Interfaces\BackendRepositoryInterface::class,function()
                {            
                    return new \App\CP\Repositories\BackendRepository;
                });

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
