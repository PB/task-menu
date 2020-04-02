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
}
