<?php
declare(strict_types=1);

namespace App\Services\Menu\Handler;

use App\Services\menu\Command\StoreMenuCommand;
use App\Services\Menu\Repository\MenuRepositoryInterface;

/**
 * Class StoreMenuHandler
 *
 * @package App\Services\Menu\Handler
 */
class StoreMenuHandler extends AbstractHandler
{
    /**
     * @param StoreMenuCommand $command
     *
     * @return array
     */
    public function handle(StoreMenuCommand $command): array
    {
        return [
            'command' => $command,
            'menu' => $this->menuRepository->storeMenu($command->toArray())
        ];
    }
}
