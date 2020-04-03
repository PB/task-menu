<?php
declare(strict_types=1);

namespace App\Services\Menu;

use App\Services\menu\Command\DestroyMenuCommand;
use App\Services\menu\Command\ShowMenuCommand;
use App\Services\menu\Command\StoreMenuCommand;
use App\Services\menu\Command\UpdateMenuCommand;
use App\Services\Menu\Handler\DestroyMenuHandler;
use App\Services\Menu\Handler\ShowMenuHandler;
use App\Services\Menu\Handler\StoreMenuHandler;
use App\Services\Menu\Handler\UpdateMenuHandler;
use App\Services\Menu\Validator\DestroyMenuValidator;
use App\Services\Menu\Validator\ShowMenuValidator;
use App\Services\Menu\Validator\StoreMenuValidator;
use App\Services\Menu\Validator\UpdateMenuValidator;
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

    /**
     * @param array $data
     *
     * @return mixed
     */
    public function showMenu(array $data = [])
    {
        $this->bus->addHandler(ShowMenuCommand::class, ShowMenuHandler::class);
        return $this->bus->dispatch(ShowMenuCommand::class, $data, [ShowMenuValidator::class]);
    }

    /**
     * @param array $data
     *
     * @return mixed
     */
    public function destroyMenu(array $data = [])
    {
        $this->bus->addHandler(DestroyMenuCommand::class, DestroyMenuHandler::class);
        return $this->bus->dispatch(DestroyMenuCommand::class, $data, [DestroyMenuValidator::class]);
    }

    /**
     * @param array $data
     *
     * @return mixed
     */
    public function updateMenu(array $data = [])
    {
        $this->bus->addHandler(UpdateMenuCommand::class, UpdateMenuHandler::class);
        return $this->bus->dispatch(UpdateMenuCommand::class, $data, [UpdateMenuValidator::class]);
    }
}
