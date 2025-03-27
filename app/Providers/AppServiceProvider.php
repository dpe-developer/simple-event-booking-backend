<?php

namespace App\Providers;

use App\Repositories\EventRepository;
use App\Services\EventService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        /* $this->app->bind(EventRepository::class, function ($app) {
            return new EventRepository();
        });

        $this->app->bind(EventService::class, function ($app) {
            return new EventService($app->make(EventRepository::class));
        }); */
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
