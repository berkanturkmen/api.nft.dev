<?php

namespace App\Models\Asset;

use App\Models\BaseModel;

class Asset extends BaseModel
{
    protected $table = 'assets';

    protected $primaryKey = 'id';

    protected $fillable = [
        'currency',
        'media_format',
        'media_url',
        'name',
        'price',
        'type',
    ];
}
