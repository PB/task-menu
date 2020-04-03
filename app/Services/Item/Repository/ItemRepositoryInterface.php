<?php
declare(strict_types=1);

namespace App\Services\Item\Repository;

/**
 * Interface ItemRepositoryInterface
 *
 * @package App\Services\Item\Repository
 */
interface ItemRepositoryInterface
{
    /**
     * @param array $items
     *
     * @return array
     */
    public function storeItem(array $items): array;

    /**
     * @param int $itemId
     *
     * @return array
     */
    public function showItem(int $itemId): array;

    /**
     * @param int $itemId
     */
    public function destroyItem(int $itemId): void;
}
