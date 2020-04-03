<?php
declare(strict_types=1);

namespace App\Services\Menu\Exceptions;

use Illuminate\Http\JsonResponse;

class ValidationException extends \Exception
{
    /**
     * @var array
     */
    private $erros;

    public function __construct(array $erros)
    {
        parent::__construct();
        $this->erros = $erros;
    }

    /**
     * @return JsonResponse
     */
    public function render(): JsonResponse
    {
        return response()->json($this->erros, JsonResponse::HTTP_BAD_REQUEST);
    }
}
