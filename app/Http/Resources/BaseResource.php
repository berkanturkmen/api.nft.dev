<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

abstract class BaseResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }

    public function toResponse($request)
    {
        return parent::toResponse($request)->setData([
            'data' => $this->toArray($request),
        ] + $this->additional);
    }
}
