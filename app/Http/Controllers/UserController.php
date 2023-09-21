<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use App\DataTransferObjects\UserDto;
use App\Http\Requests\UserStoreRequest;


class UserController extends Controller
{
    public function __construct(
        protected UserService $service
    ) {
    }

    public function store(UserStoreRequest $request)
    {
        $user = $this->service->store(UserDto::formRequest($request));
        return view("crud_with_post.index", compact("user"));
    }
}
