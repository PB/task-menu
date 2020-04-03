<?php
declare(strict_types=1);

namespace App\Services\Item\Repository;

use App\Item;
use App\Menu;
use App\Services\Menu\MenuService;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Nette\NotImplementedException;

/**
 * Class CachedItemRepository
 *
 * @package App\Services\Item\Repository
 */
class CachedItemRepository extends ItemRepository
{
    /**
     * @param int $menuId
     *
     * @return array
     */
    public function showMenuItems(int $menuId): array
    {
        $key = md5('menuItem_' . $menuId);
        if (Cache::has($key)) {
            return Cache::get($key);
        }

        $menu = parent::showMenuItems($menuId);
        Cache::put($key, $menu, 36000);

        return $menu;
    }

    /**
     * @param array $items
     *
     * @return array
     */
    public function storeItem(array $items): array
    {
        $result = parent::storeItem($items);
        // dirty way to remove from cache (only for demo reasons)
        Cache::flush();

        return $result;
    }
}
