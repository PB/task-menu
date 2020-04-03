<?php
declare(strict_types=1);

namespace App\Services\Menu\Command;

use Illuminate\Contracts\Support\Arrayable;

/**
 * Class StoreMenuCommand
 *
 * @package App\Services\menu\Command
 */
class StoreMenuCommand implements Arrayable
{

    /**
     * @var string
     */
    private $name;
    /**
     * @var int|null
     */
    private $maxDepth;
    /**
     * @var int|null
     */
    private $maxChildren;

    /**
     * StoreMenuCommand constructor.
     *
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        $this->name = $data['name'] ?? null;
        $this->maxDepth = $data['max_depth'] ?? null;
        $this->maxChildren = $data['max_children'] ?? null;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'max_depth' => $this->maxDepth,
            'max_children' => $this->maxChildren,
        ];
    }
}
