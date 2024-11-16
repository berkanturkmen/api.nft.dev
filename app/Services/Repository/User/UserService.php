<?php

namespace App\Services\Repository\User;

use App\Filters\FilterAction;
use App\Filters\RangeFilter;
use App\Filters\SearchFilter;
use App\Filters\SortFilter;
use App\Http\Resources\User\UserCollection;
use App\Http\Resources\User\UserResource;
use App\Repositories\User\UserInterface;
use App\Services\Repository\OperationService;

class UserService extends OperationService
{
    public function __construct(private UserInterface $repository)
    {
        parent::__construct($repository);
    }

    public function all()
    {
        $filters = [
            RangeFilter::class,
            SearchFilter::class,
            SortFilter::class,
        ];

        $query = $this->repository->getQuery();

        $apply = FilterAction::apply($query, $filters, request()->all());

        $items = $apply->paginate();

        return new UserCollection($items);
    }

    public function create(array $request)
    {
        $item = $this->repository->create($request);

        return new UserResource($item);
    }

    public function find($id)
    {
        $item = $this->repository->findOrFail($id);

        return new UserResource($item);
    }

    public function update($id, array $request)
    {
        $item = $this->repository->update($id, $request);

        return new UserResource($item);
    }

    public function delete($id)
    {
        $item = $this->repository->delete($id);

        return new UserResource($item);
    }
}
