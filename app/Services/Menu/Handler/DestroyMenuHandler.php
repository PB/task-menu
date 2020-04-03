<?php
declare(strict_types=1);

namespace App\Services\Menu\Handler;

use App\Services\menu\Command\DestroyMenuCommand;

/**
 * Class DestroyMenuHandler
 *
 * @package App\Services\Menu\Handler
 */
class DestroyMenuHandler extends AbstractHandler
{

    /**
     * @param DestroyMenuCommand $command
     *
     * @return array
     */
    public function handle(DestroyMenuCommand $command): array
    {
        $this->menuRepository->destroyMenu($command->getId());
        return [
            'command' => $command,
        ];
    }
}
