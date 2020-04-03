<?php
declare(strict_types=1);

namespace App\Services\Menu\Repository;

use App\Menu;
use Illuminate\Support\Facades\DB;

/**
 * Class MenuRepository
 *
 * @package App\Services\Menu\Repository
 */
class MenuRepository implements MenuRepositoryInterface
{

    /**
     * @param array $menu
     *
     * @return array
     */
    public function storeMenu(array $menu): array
    {
        DB::beginTransaction();
        try {
            $menu = Menu::create($menu)->toArray();
            DB::commit();

            return $menu;
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
    public function showMenu(int $menuId): array
    {
        return Menu::findOrFail($menuId)->toArray();
    }

    /**
     * @param int $menuId
     */
    public function destroyMenu(int $menuId): void
    {
        Menu::findOrFail($menuId)->delete();
    }

    /**
     * @param int   $menuId
     * @param array $data
     *
     * @return array
     */
    public function updateMenu(int $menuId, array $data): array
    {
        DB::beginTransaction();
        try {
            $menu = Menu::findOrFail($menuId);
            isset($data['name']) and $menu->name = $data['name'];
            array_key_exists('max_depth', $data) and $menu->max_depth = $data['max_depth'];
            array_key_exists('max_children', $data)  and $menu->max_children = $data['max_children'];
            $menu->save();
            DB::commit();

            return $menu->toArray();
        } catch (\Exception $e) {
            DB::rollBack();
            throw new \RuntimeException($e->getMessage());
        }
    }
}
