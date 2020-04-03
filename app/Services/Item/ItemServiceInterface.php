<?php
declare(strict_types=1);

namespace App\Services\Item;

/**
 * Interface ItemServiceInterface
 *
 * @package App\Services\Item
 */
interface ItemServiceInterface
{
    /**
     * @param array $data
     *
     * @return mixed
     */
    public function storeItem(array $data = []);

    /**
     * @param array $data
     *
     * @return mixed
     */
    public function showItem(array $data = []);

    /**
     * @param array $data
     *
     * @return mixed
     */
    public function destroyItem(array $data = []);
}
