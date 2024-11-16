<?php

namespace App\Services\Repository;

use App\Enums\ApiEnums;
use App\Repositories\BaseInterface;

class OperationService
{
    public function __construct(protected BaseInterface $base)
    {
        //
    }

    public function create(array $data)
    {
        return $this->base->create($data);
    }

    public function delete($id)
    {
        return $this->base->delete($id);
    }

    public function exists(string $key, $value)
    {
        return $this->base->exists($key, $value);
    }

    public function find($id)
    {
        return $this->base->find($id);
    }

    public function findOrFail($id)
    {
        return $this->base->findOrFail($id);
    }

    public function forceDelete($id)
    {
        return $this->base->forceDelete($id);
    }

    public function getQuery()
    {
        return $this->base->getQuery();
    }

    public function paginate(int $count = ApiEnums::DEFAULT_PAGINATION)
    {
        return $this->base->paginate($count);
    }

    public function restore($id)
    {
        return $this->base->restore($id);
    }

    public function update($id, array $data)
    {
        return $this->base->update($id, $data);
    }

    public function withRelations($query, array $relations)
    {
        return $this->base->withRelations($query, $relations);
    }
}
