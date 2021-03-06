<?php
declare(strict_types=1);

namespace App\Services\Menu;

/**
 * Interface MenuServiceInterface
 *
 * @package App\Services\Menu
 */
interface MenuServiceInterface
{
    /**
     * @param array $data
     *
     * @return mixed
     */
    public function storeMenu(array $data = []);

    /**
     * @param array $data
     *
     * @return mixed
     */
    public function showMenu(array $data = []);

    /**
     * @param array $data
     *
     * @return mixed
     */
    public function destroyMenu(array $data = []);

    /**
     * @param array $data
     *
     * @return mixed
     */
    public function updateMenu(array $data = []);
}
