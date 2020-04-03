<?php
declare(strict_types=1);

namespace App\Services\menu\Command;

use Illuminate\Contracts\Support\Arrayable;

/**
 * Class ShowMenuCommand
 *
 * @package App\Services\menu\Command
 */
class ShowMenuCommand implements Arrayable
{
    /**
     * @var int
     */
    private $id;

    /**
     * ShowMenuCommand constructor.
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
