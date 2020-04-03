<?php
declare(strict_types=1);

namespace App\Services\Menu\Validator;

use App\Services\Menu\Exceptions\ValidationException;
use Illuminate\Support\Facades\Validator;
use League\Tactician\Middleware;

/**
 * Class ShowMenuValidator
 *
 * @package App\Services\Menu\Validator
 */
class ShowMenuValidator implements Middleware
{

    /**
     * @var array
     */
    protected $rules = [
        'id' => 'required|integer',
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
