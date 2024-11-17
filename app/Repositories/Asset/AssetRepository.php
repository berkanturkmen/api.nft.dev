<?php

namespace App\Repositories\Asset;

use App\Models\Asset\Asset;
use App\Repositories\BaseRepository;

class AssetRepository extends BaseRepository implements AssetInterface
{
    public function __construct(private Asset $model)
    {
        parent::__construct($model);
    }
}
