<?php

namespace App\Services;

use App\Models\User;
use App\DataTransferObjects\UserDto;

class BlogService
{
    const MODEL = User::class;

    public function store(UserDto $dto): User
    {
        $user = self::MODEL::query()->create([
            'first_name' => $dto->first_name,
            'last_name' => $dto->last_name,
            'email' => $dto->email,
            'phone' => $dto->phone
        ]);

        return $user;
    }
}
