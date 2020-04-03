<?php
declare(strict_types=1);

namespace App\Services\Menu\Repository;

/**
 * Interface MenuRepositoryInterface
 *
 * @package App\Services\Menu\Repository
 */
interface MenuRepositoryInterface
{
    /**
     * @param array $menu
     *
     * @return array
     */
    public function storeMenu(array $menu): array;

    /**
     * @param int $menuId
     *
     * @return array
     */
    public function showMenu(int $menuId): array;

    /**
     * @param int $menuId
     */
    public function destroyMenu(int $menuId): void;

    /**
     * @param int   $menuId
     * @param array $menu
     *
     * @return array
     */
    public function updateMenu(int $menuId, array $menu): array;
}
