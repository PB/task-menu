<?php
declare(strict_types=1);

namespace App\Services\menu\Command;

use Illuminate\Contracts\Support\Arrayable;

/**
 * Class UpdateMenuCommand
 *
 * @package App\Services\menu\Command
 */
class UpdateMenuCommand implements Arrayable
{
    /**
     * @var array
     */
    private $data;

    /**
     * UpdateMenuCommand constructor.
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

    /**
     * @return int
     */
    public function getId(): int
    {
        return (int)$this->data['id'];
    }
}
