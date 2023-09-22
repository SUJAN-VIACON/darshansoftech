<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Requests\UserRequest;
use App\DataTransferObjects\UserDto;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;

class UserApiController extends Controller
{

    public function __construct(
        protected UserService $service
    ) {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request): UserResource
    {
        $user = $this->service->store(UserDto::formRequest($request));
        return UserResource::make(($user));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        $user = $this->service->update($user, UserDto::formRequest($request));
        return UserResource::make(($user));
    }   

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        return $this->service->delete($user);
    }
}
