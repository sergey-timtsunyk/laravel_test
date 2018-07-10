<?php

namespace App\Providers;

use App\Listeners\RecalculatePopulationListener;
use App\Service\UpdateSumPopulationInDB;
use App\Service\UpdateSumPopulationInterface;
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
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(UpdateSumPopulationInterface::class, new UpdateSumPopulationInDB());


        $this->app->bindIf(RecalculatePopulationListener::class, function ($app) {
            return new RecalculatePopulationListener($app->get(UpdateSumPopulationInterface::class));
        });
    }
}
