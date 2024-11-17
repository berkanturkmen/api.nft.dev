<?php

namespace App\Http\Controllers\Asset;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Asset\AssetRequest;
use App\Services\Repository\Asset\AssetService;

class AssetController extends BaseController
{
    public function __construct(private readonly AssetService $service)
    {
        //
    }

    public function index()
    {
        return $this->ok(
            data: $this->service->all(),
        );
    }

    public function store(AssetRequest $request)
    {
        return $this->created(
            data: $this->service->create($request->validated()),
        );
    }

    public function show($id)
    {
        return $this->ok(
            data: $this->service->find($id),
        );
    }

    public function update($id, AssetRequest $request)
    {
        return $this->ok(
            data: $this->service->update($id, $request->validated()),
        );
    }

    public function destroy($id)
    {
        $this->service->delete($id);

        return $this->noContent();
    }
}