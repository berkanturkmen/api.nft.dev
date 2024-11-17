<?php

namespace App\Filters;

use Closure;
use Illuminate\Database\Eloquent\Builder;

class RangeFilter
{
    protected $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function handle(Builder $builder, Closure $next): Builder
    {
        foreach (self::getFields() as $field) {
            $min = $this->data["min_{$field}"] ?? null;
            $max = $this->data["max_{$field}"] ?? null;

            if ($min !== null && $max !== null) {
                $builder->whereBetween($field, [$min, $max]);
            } elseif ($min !== null) {
                $builder->where($field, '>=', $min);
            } elseif ($max !== null) {
                $builder->where($field, '<=', $max);
            }
        }

        return $next($builder);
    }

    private function getFields(): array
    {
        return [
            'created_at',
            'price',
        ];
    }
}
