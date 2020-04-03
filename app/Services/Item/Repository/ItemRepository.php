<?php
declare(strict_types=1);

namespace App\Services\Item\Repository;

use App\Item;
use App\Menu;
use App\Services\Menu\MenuService;
use Illuminate\Support\Facades\DB;
use Nette\NotImplementedException;

/**
 * Class ItemRepository
 *
 * @package App\Services\Item\Repository
 */
class ItemRepository implements ItemRepositoryInterface
{

    /**
     * @param array $items
     *
     * @return array
     */
    public function storeItem(array $items): array
    {
        DB::beginTransaction();
        try {
            $result = [];
            // that is probably not the right way
            foreach ($items as $item) {
                $result[] = Item::create($item)->toArray();
            }
            DB::commit();

            return $result;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new \RuntimeException($e->getMessage());
        }
    }

    /**
     * @param int $menuId
     *
     * @return array
     */
    public function showMenuItems(int $menuId): array
    {
        //not the best place (but check if menu exist)
        $menu = Menu::findOrFail($menuId);
        return Item::scoped([ 'menu_id' => $menu->id ])->get()->toTree()->toArray();
    }

    /**
     * @param int $itemId
     */
    public function destroyItem(int $itemId): void
    {
        //todo: Implement
    }
}
