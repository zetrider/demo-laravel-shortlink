<?php

namespace App\Providers;

use App\Http\Actions\Visit\VisitAction;
use App\Http\Actions\Visit\VisitActionInterface;
use App\Services\Slug\SlugService;
use App\Services\Slug\SlugServiceInterface;
use App\Services\Visitor\VisitorIdService;
use App\Services\Visitor\CookieVisitorIdService;
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
        $this->app->singleton(SlugServiceInterface::class, function ($app) {
            return new SlugService();
        });
        $this->app->singleton(VisitActionInterface::class, function ($app) {
            return new VisitAction();
        });
        $this->app->singleton(VisitorIdService::class, function ($app) {
            return new CookieVisitorIdService();
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
