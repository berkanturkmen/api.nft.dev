<?php

namespace App\Http\Requests\Asset;

use Illuminate\Foundation\Http\FormRequest;

class AssetRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'currency' => ['required', 'in:ETH,USDT'],
            'media_format' => ['required', 'in:jpeg,jpg,png,mp4'],
            'media_url' => ['required', 'string', 'url'],
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric'],
            'type' => ['required', 'in:image,video'],
        ];
    }
}
