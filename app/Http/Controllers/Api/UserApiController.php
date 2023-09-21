<?php

namespace App\Http\Controllers\Api;

use App\Services\UserService;
use App\DataTransferObjects\UserDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Resources\UserResource;

class UserApiController extends Controller
{
    public function __construct(
        protected UserService $service
    ) {
    }

    public function store(UserStoreRequest $request): UserResource
    {
        $user = $this->service->store(UserDto::formRequest($request));
        return UserResource::make(($user));
    }
}
