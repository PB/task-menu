<?php
declare(strict_types=1);

namespace App\Services\Item\Repository;

use App\Item;
use Illuminate\Support\Facades\DB;

/**
 * Class ItemRepository
 *
 * @package App\Services\Item\Repository
 */
class ItemRepository implements ItemRepositoryInterface
{

    /**
     * @param array $items
     *
     * @return array
     */
    public function storeItem(array $items): array
    {
        DB::beginTransaction();
        try {
            $result = [];
            // that is probably not the right way
            foreach ($items as $item) {
                $result[] = Item::create($item)->toArray();
            }
            DB::commit();

            return $result;
        } catch (\Exception $e) {
            DB::rollBack();
            throw new \RuntimeException($e->getMessage());
        }
    }

    /**
     * @param int $itemId
     *
     * @return array
     */
    public function showItem(int $itemId): array
    {
    }

    /**
     * @param int $itemId
     */
    public function destroyItem(int $itemId): void
    {
    }
}
