<?php
declare(strict_types=1);

namespace App\Services\Menu;

use App\Services\menu\Command\StoreMenuCommand;
use App\Services\Menu\Handler\StoreMenuHandler;
use App\Services\Menu\Validator\StoreMenuValidator;
use Joselfonseca\LaravelTactician\CommandBusInterface;

/**
 * Class MenuService
 *
 * @package App\Services\Menu
 */
class MenuService implements MenuServiceInterface
{

    /**
     * @var CommandBusInterface
     */
    private $bus;

    /**
     * MenuService constructor.
     *
     * @param CommandBusInterface $bus
     */
    public function __construct(CommandBusInterface $bus)
    {
        $this->bus = $bus;
    }

    /**
     * @param array $data
     *
     * @return mixed
     */
    public function storeMenu(array $data = [])
    {
        $this->bus->addHandler(StoreMenuCommand::class, StoreMenuHandler::class);
        return $this->bus->dispatch(StoreMenuCommand::class, $data, [StoreMenuValidator::class]);
    }
}
