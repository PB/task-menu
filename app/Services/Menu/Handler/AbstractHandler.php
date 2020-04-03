<?php
declare(strict_types=1);

namespace App\Services\Menu\Handler;

use App\Services\Menu\Repository\MenuRepositoryInterface;

/**
 * Class AbstractHandler
 *
 * @package App\Services\Menu\Handler
 */
abstract class AbstractHandler
{
    /**
     * @var MenuRepositoryInterface
     */
    protected $menuRepository;

    /**
     * StoreMenuHandler constructor.
     *
     * @param MenuRepositoryInterface $menuRepository
     */
    public function __construct(MenuRepositoryInterface $menuRepository)
    {
        $this->menuRepository = $menuRepository;
    }
}
