<?php

namespace App\Extensions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    public function render($request, Throwable $e): JsonResponse|Response
    {
        // Handle 404 NotFoundHttpException
        if ($e instanceof NotFoundHttpException) {
            return response()->json([
                'message' => 'Record not found.'
            ], 404);
        }

        // Handle ModelNotFoundException
        if ($e instanceof ModelNotFoundException) {
            return response()->json([
                'message' => 'Record not found.'
            ], 404);
        }

        return parent::render($request, $e);
    }
}
