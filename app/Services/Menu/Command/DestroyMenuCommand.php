<?php
declare(strict_types=1);

namespace App\Services\Menu\Command;

use Illuminate\Contracts\Support\Arrayable;

/**
 * Class DestroyMenuCommand
 *
 * @package App\Services\menu\Command
 */
class DestroyMenuCommand implements Arrayable
{
    /**
     * @var int
     */
    private $id;

    /**
     * DestroyMenuCommand constructor.
     *
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        $this->id = $data['id'] ?? null;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'id' => $this->id,
        ];
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return (int)$this->id;
    }
}
