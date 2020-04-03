<?php
declare(strict_types=1);

namespace App\Services\Item\Handler;

use App\Services\Item\Command\ShowItemCommand;

/**
 * Class ShowItemHandler
 *
 * @package App\Services\Item\Handler
 */
class ShowItemHandler extends AbstractHandler
{

    /**
     * @param ShowItemCommand $command
     *
     * @return array
     */
    public function handle(ShowItemCommand $command): array
    {
        return [
            'command' => $command,
            'item' => $this->itemRepository->showMenuItems($command->getMenuId())
        ];
    }
}
