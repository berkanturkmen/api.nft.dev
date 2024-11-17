<?php

namespace App\Services\Repository\Asset;

use App\Filters\FilterAction;
use App\Filters\RangeFilter;
use App\Filters\SearchFilter;
use App\Filters\SortFilter;
use App\Http\Resources\Asset\AssetCollection;
use App\Http\Resources\Asset\AssetResource;
use App\Repositories\Asset\AssetInterface;
use App\Services\Repository\OperationService;

class AssetService extends OperationService
{
    public function __construct(private AssetInterface $repository)
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

        return new AssetCollection($items);
    }

    public function create(array $request)
    {
        $item = $this->repository->create($request);

        return new AssetResource($item);
    }

    public function find($id)
    {
        $item = $this->repository->findOrFail($id);

        return new AssetResource($item);
    }

    public function update($id, array $request)
    {
        $item = $this->repository->update($id, $request);

        return new AssetResource($item);
    }

    public function delete($id)
    {
        $item = $this->repository->delete($id);

        return new AssetResource($item);
    }
}
