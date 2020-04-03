<?php

namespace App\Providers;

use App\Services\Item\ItemService;
use App\Services\Item\ItemServiceInterface;
use App\Services\Item\Repository\CachedItemRepository;
use App\Services\Item\Repository\ItemRepositoryInterface;
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
        $this->app->bind(ItemServiceInterface::class, ItemService::class);
        $this->app->bind(ItemRepositoryInterface::class, CachedItemRepository::class);
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
