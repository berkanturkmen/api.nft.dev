<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pipeline\Pipeline;

class FilterAction
{
    public static function apply(Builder $query, array $filters, array $data): Builder
    {
        return app(Pipeline::class)->send($query)->through(
            collect($filters)->map(fn ($filter) => new $filter($data))->all(),
        )->thenReturn();
    }
}
