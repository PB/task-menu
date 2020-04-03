<?php
declare(strict_types=1);

namespace App\Services\Item\Command;

use Illuminate\Contracts\Support\Arrayable;

/**
 * Class ShowItemCommand
 *
 * @package App\Services\Item\Command
 */
class ShowItemCommand implements Arrayable
{
    /**
     * @var int
     */
    private $menuId;

    /**
     * ShowItemCommand constructor.
     *
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        $this->menuId = $data['menu_id'] ?? null;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'menu_id' => $this->menuId,
        ];
    }

    /**
     * @return int
     */
    public function getMenuId(): int
    {
        return (int)$this->menuId;
    }
}
