<?php

namespace App\Traits\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

trait ApiResponse
{
    public function created($data = [], ?string $message = null): JsonResponse
    {
        $message = $message ?? 'Your operation has been successfully completed.';

        return response()->success($data, __($message), Response::HTTP_CREATED);
    }

    public function error($errors = [], ?string $message = null): JsonResponse
    {
        $message = $message ?? 'There seems to be an issue. Please try again later.';

        return response()->error($errors, __($message), Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    public function noContent(?string $message = null): JsonResponse
    {
        $message = $message ?? 'Your operation has been successfully completed.';

        return response()->success([], __($message), Response::HTTP_NO_CONTENT);
    }

    public function notFound(?string $message = null): JsonResponse
    {
        $message = $message ?? 'Your operation has been successfully completed.';

        return response()->error([], __($message), Response::HTTP_NOT_FOUND);
    }

    public function ok($data = [], ?string $message = null): JsonResponse
    {
        $message = $message ?? 'Your operation has been successfully completed.';

        return response()->success($data, __($message), Response::HTTP_OK);
    }

    public function unauthorized(): JsonResponse
    {
        //
    }

    public function validationWarning(): JsonResponse
    {
        //
    }
}
