<?php
declare(strict_types=1);

namespace App\Services\Item\Command;

use Illuminate\Contracts\Support\Arrayable;

/**
 * Class StoreItemCommand
 *
 * @package App\Services\Item\Command
 */
class StoreItemCommand implements Arrayable
{
    /**
     * @var array
     */
    private $data;

    /**
     * StoreItemCommand constructor.
     *
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        $this->data = $data;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return $this->data;
    }
}
