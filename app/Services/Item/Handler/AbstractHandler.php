<?php
declare(strict_types=1);

namespace App\Services\Item\Handler;

use App\Services\Item\Repository\ItemRepositoryInterface;

/**
 * Class AbstractHandler
 *
 * @package App\Services\Item\Handler
 */
abstract class AbstractHandler
{
    /**
     * @var ItemRepositoryInterface
     */
    protected $itemRepository;

    /**
     * StoreMenuHandler constructor.
     *
     * @param ItemRepositoryInterface $itemRepository
     */
    public function __construct(ItemRepositoryInterface $itemRepository)
    {
        $this->itemRepository = $itemRepository;
    }
}
