<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\BaseController;
use App\Http\Requests\User\UserRequest;
use App\Services\Repository\User\UserService;

class UserController extends BaseController
{
    public function __construct(private readonly UserService $service)
    {
        //
    }

    public function index()
    {
        return $this->ok(
            data: $this->service->all(),
        );
    }

    public function store(UserRequest $request)
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

    public function update($id, UserRequest $request)
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
