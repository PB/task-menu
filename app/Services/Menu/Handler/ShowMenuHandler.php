<?php
declare(strict_types=1);

namespace App\Services\Menu\Handler;

use App\Services\menu\Command\ShowMenuCommand;
use App\Services\menu\Command\StoreMenuCommand;
use App\Services\Menu\Repository\MenuRepositoryInterface;

/**
 * Class ShowMenuHandler
 *
 * @package App\Services\Menu\Handler
 */
class ShowMenuHandler extends AbstractHandler
{

    /**
     * @param ShowMenuCommand $command
     *
     * @return array
     */
    public function handle(ShowMenuCommand $command): array
    {
        return [
            'command' => $command,
            'menu' => $this->menuRepository->showMenu($command->getId())
        ];
    }
}
