<?php
declare(strict_types=1);

namespace App\Services\Menu\Handler;

use App\Services\Menu\Command\UpdateMenuCommand;

/**
 * Class UpdateMenuHandler
 *
 * @package App\Services\Menu\Handler
 */
class UpdateMenuHandler extends AbstractHandler
{
    /**
     * @param UpdateMenuCommand $command
     *
     * @return array
     */
    public function handle(UpdateMenuCommand $command): array
    {
        return [
            'command' => $command,
            'menu' => $this->menuRepository->updateMenu($command->getId(), $command->toArray())
        ];
    }
}
