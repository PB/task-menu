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
}
