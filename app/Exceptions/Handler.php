<?php
declare(strict_types=1);

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class Handler extends ExceptionHandler
{
    /**
     * Render an exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Exception               $e
     *
     * @return Response
     */
    public function render($request, \Exception $e): Response
    {
        if ($e instanceof ModelNotFoundException && $request->isJson()) {
            return response()->json([], JsonResponse::HTTP_NOT_FOUND);
        }

        return parent::render($request, $e);
    }
}
