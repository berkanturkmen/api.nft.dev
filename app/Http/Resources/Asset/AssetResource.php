<?php

namespace App\Http\Resources\Asset;

use App\Http\Resources\BaseResource;
use Illuminate\Http\Request;

class AssetResource extends BaseResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'currency' => $this->currency,
            'media_format' => $this->media_format,
            'media_url' => $this->media_url,
            'name' => $this->name,
            'price' => $this->price,
            'type' => $this->type,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
