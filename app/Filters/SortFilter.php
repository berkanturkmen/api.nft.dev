<?php

namespace App\Filters;

use Closure;
use Illuminate\Database\Eloquent\Builder;

class SortFilter
{
    protected $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function handle(Builder $builder, Closure $next): Builder
    {
        $sort = $this->data['sort'] ?? 'created_at';
        $order = $this->data['order'] ?? 'desc';

        $builder->orderBy($sort, $order);

        return $next($builder);
    }
}
