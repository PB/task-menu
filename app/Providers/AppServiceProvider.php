<?php

namespace App\Providers;

use App\Services\Menu\MenuService;
use App\Services\Menu\MenuServiceInterface;
use App\Services\Menu\Repository\MenuRepository;
use App\Services\Menu\Repository\MenuRepositoryInterface;
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
        $this->app->bind(MenuServiceInterface::class, MenuService::class);
        $this->app->bind(MenuRepositoryInterface::class, MenuRepository::class);
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
