<?php

namespace App\Filters;

use Closure;
use Illuminate\Database\Eloquent\Builder;

class SearchFilter
{
    protected $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function handle(Builder $builder, Closure $next): Builder
    {
        if (! empty($this->data['search'])) {
            $search = $this->data['search'];

            $builder->where(function ($query) use ($search) {
                foreach (self::getFields() as $field) {
                    $query->orWhere($field, 'LIKE', "%{$search}%");
                }
            });
        }

        return $next($builder);
    }

    private function getFields(): array
    {
        return [
            'name',
        ];
    }
}