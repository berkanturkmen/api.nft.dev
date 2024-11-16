<?php

namespace App\Repositories;

use App\Enums\ApiEnums;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BaseRepository implements BaseInterface
{
    public function __construct(protected Model $base)
    {
        //
    }

    public function create(array $data)
    {
        return $this->executeTransaction(function () use ($data) {
            return $this->base->create($data);
        });
    }

    public function delete($id)
    {
        return $this->executeTransaction(function () use ($id) {
            $result = $this->base->findOrFail($id);

            $result->delete();

            return $result;
        });
    }

    public function executeTransaction(callable $callback)
    {
        try {
            DB::beginTransaction();

            $result = $callback();

            DB::commit();

            return $result;
        } catch (ModelNotFoundException $e) {
            DB::rollBack();

            throw $e;
        } catch (Exception $e) {
            DB::rollBack();

            Log::error($e->getMessage());

            throw new Exception($e->getMessage());
        }
    }

    public function exists(string $key, $value)
    {
        return $this->base->where($key, $value)->exists();
    }

    public function find($id)
    {
        $result = $this->base->find($id);

        if (! $result) {
            throw new ModelNotFoundException;
        }

        return $result;
    }

    public function findOrFail($id)
    {
        $result = $this->base->findOrFail($id);

        if (! $result) {
            throw new ModelNotFoundException;
        }

        return $result;
    }

    public function forceDelete($id)
    {
        return $this->executeTransaction(function () use ($id) {
            $result = $this->base->forceDelete($id);

            $result->restore();

            return $result;
        });
    }

    public function getQuery()
    {
        return $this->base->newQuery();
    }

    public function paginate(int $count = ApiEnums::DEFAULT_PAGINATION)
    {
        return $this->base->paginate($count);
    }

    public function restore($id)
    {
        return $this->executeTransaction(function () use ($id) {
            $result = $this->base->withTrashed()->findOrFail($id);

            $result->restore();

            return $result;
        });
    }

    public function update($id, array $data)
    {
        return $this->executeTransaction(function () use ($id, $data) {
            $result = $this->base->findOrFail($id);

            $result->update($data);

            return $result;
        });
    }

    public function withRelations($query, array $relations)
    {
        if (! empty($relations)) {
            $query->with($relations);
        }

        return $query;
    }
}
