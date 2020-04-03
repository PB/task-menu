<?php
declare(strict_types=1);

namespace App\Services\Item\Validator;

use App\Services\Item\Exceptions\ValidationException;
use Illuminate\Support\Facades\Validator;
use League\Tactician\Middleware;

/**
 * Class ShowItemValidator
 *
 * @package App\Services\Item\Validator
 */
class ShowItemValidator implements Middleware
{

    /**
     * @var array
     */
    protected $rules = [
        'menu_id' => 'required|integer',
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
