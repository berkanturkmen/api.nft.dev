<?php

namespace App\Providers;

use App\Http\Resources\BaseCollection;
use App\Http\Resources\BaseResource;
use Illuminate\Routing\ResponseFactory;
use Illuminate\Support\ServiceProvider;

class ResponseServiceProvider extends ServiceProvider
{
    public function boot(ResponseFactory $factory): void
    {
        $factory->macro('success', function ($data = [], string $message = '', $status = null, array $headers = []) use ($factory) {
            if ($data instanceof BaseCollection || $data instanceof BaseResource) {
                return $data->additional(['message' => $message])->response()->setStatusCode($status ?? 200);
            }

            $response = [
                'data' => $data,
                'message' => $message,
            ];

            return $factory->json($response, $status ?? 200, $headers);
        });

        $factory->macro('error', function ($errors = [], string $message = '', $status = null, array $headers = []) use ($factory) {
            $response = [
                'errors' => is_string($errors) ? ['error' => $errors] : $errors,
                'message' => $message,
            ];

            return $factory->json($response, $status ?? 400, $headers);
        });
    }
}
