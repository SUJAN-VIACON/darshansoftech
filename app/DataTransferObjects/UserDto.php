<?php

namespace App\DataTransferObjects;

use App\Http\Requests\UserStoreRequest;

class UserDto
{
    public function __construct(
        public readonly string $first_name,
        public readonly string $last_name,
        public readonly string $email,
        public readonly string $phone,
        public readonly object $image,
    ) {
    }

    public static function formRequest(UserStoreRequest $request): UserDto
    {
        return new self(
            first_name: $request->validated(key: 'first_name'),
            last_name: $request->validated(key: 'last_name'),
            email: $request->validated(key: 'email'),
            phone: $request->validated(key: 'phone'),
            image: $request->validated(key: 'image'),
        );
    }
}
