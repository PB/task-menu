<?php
declare(strict_types=1);

namespace App\Services\Item\Handler;

use App\Services\Item\Command\StoreItemCommand;

/**
 * Class StoreItemHandler
 *
 * @package App\Services\Item\Handler
 */
class StoreItemHandler extends AbstractHandler
{
    /**
     * @param StoreItemCommand $command
     *
     * @return array
     */
    public function handle(StoreItemCommand $command): array
    {
        $items = $command->toArray();
        $menuId = \array_pop($items);
        $data = $this->prepareInputData($menuId, $items);
        return [
            'command' => $command,
            'item' => $this->itemRepository->storeItem($data)
        ];
    }

    /**
     * @param int   $menuId
     * @param array $data
     *
     * @return array
     */
    public function prepareInputData(int $menuId, array $data): array
    {
        foreach ($data as &$item) {
            $item['menu_id'] = $menuId;
            !empty($item['children']) and $item['children'] = $this->prepareInputData($menuId, $item['children']);
        }

        return $data;
    }
}
