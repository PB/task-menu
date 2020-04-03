<?php
declare(strict_types=1);

namespace App\Services\Menu\Validator;

use App\Services\Menu\Exceptions\ValidationException;
use Illuminate\Support\Facades\Validator;
use League\Tactician\Middleware;

/**
 * Class StoreMenuValidator
 *
 * @package App\Services\Menu\Validator
 */
class StoreMenuValidator implements Middleware
{

    /**
     * @var array
     */
    protected $rules = [
        'name' => 'required|string|max:255',
        'max_depth' => 'nullable|integer|min:0',
        'max_children' => 'nullable|integer|min:0'
    ];

    /**
     * @param object   $command
     * @param callable $next
     *
     * @return mixed
     * @throws ValidationException
     */
    public function execute($command, callable $next)
    {
        $validator = Validator::make($command->toArray(), $this->rules);
        if ($validator->fails()) {
            throw new ValidationException($validator->errors()->toArray());
        }
        return $next($command);
    }
}
