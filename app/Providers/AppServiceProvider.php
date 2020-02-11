<?php

namespace App\Providers;

use App\Services\ShortLinkService;
use Hashids\Hashids;
use Illuminate\Config\Repository as ConfigRepository;
use Illuminate\Foundation\Application;
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
        $this->app->singleton(Hashids::class, static function (Application $app) {
            /** @var ConfigRepository $config */
            $config = $app->get('config');

            return new Hashids($config->get('app.key'));
        });

        $this->app->singleton(ShortLinkService::class);
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
