<?php
declare(strict_types=1);

namespace App\Services\Item;

use App\Services\Item\Command\ShowItemCommand;
use App\Services\Item\Command\StoreItemCommand;
use App\Services\Item\Handler\ShowItemHandler;
use App\Services\Item\Handler\StoreItemHandler;
use App\Services\Item\Validator\ShowItemValidator;
use App\Services\Item\Validator\StoreItemValidator;
use Joselfonseca\LaravelTactician\CommandBusInterface;

/**
 * Class ItemService
 *
 * @package App\Services\Item
 */
class ItemService implements ItemServiceInterface
{

    /**
     * @var CommandBusInterface
     */
    private $bus;

    /**
     * ItemService constructor.
     *
     * @param CommandBusInterface $bus
     */
    public function __construct(CommandBusInterface $bus)
    {
        $this->bus = $bus;
    }

    /**
     * @inheritDoc
     */
    public function storeItem(array $data = [])
    {
        $this->bus->addHandler(StoreItemCommand::class, StoreItemHandler::class);
        return $this->bus->dispatch(StoreItemCommand::class, $data, [StoreItemValidator::class]);
    }

    /**
     * @inheritDoc
     */
    public function showItem(array $data = [])
    {
        $this->bus->addHandler(ShowItemCommand::class, ShowItemHandler::class);
        return $this->bus->dispatch(ShowItemCommand::class, $data, [ShowItemValidator::class]);
    }

    /**
     * @inheritDoc
     */
    public function destroyItem(array $data = [])
    {
        // TODO: Implement destroyItem() method.
    }
}
