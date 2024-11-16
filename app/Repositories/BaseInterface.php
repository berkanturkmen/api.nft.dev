<?php

namespace App\Repositories;

use App\Enums\ApiEnums;

interface BaseInterface
{
    public function create(array $data);

    public function delete($id);

    public function executeTransaction(callable $callback);

    public function exists(string $key, $value);

    public function find($id);

    public function findOrFail($id);

    public function forceDelete($id);

    public function getQuery();

    public function paginate(int $count = ApiEnums::DEFAULT_PAGINATION);

    public function restore($id);

    public function update($id, array $data);

    public function withRelations($query, array $relations);
}
