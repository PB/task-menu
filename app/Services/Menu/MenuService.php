<?php
declare(strict_types=1);

namespace App\Services\Menu;

use App\Services\menu\Command\ShowMenuCommand;
use App\Services\menu\Command\StoreMenuCommand;
use App\Services\Menu\Handler\ShowMenuHandler;
use App\Services\Menu\Handler\StoreMenuHandler;
use App\Services\Menu\Validator\ShowMenuValidator;
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
}
