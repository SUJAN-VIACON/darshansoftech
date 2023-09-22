<?php

namespace App\Services;

use App\Models\User;
use App\DataTransferObjects\UserDto;

class UserService
{
    const MODEL = User::class;

    public function store(UserDto $dto): User
    {
        $imageName =  null;

        if ($dto->image) {
            $imageName =  $this->saveImage($dto->image);
        }

        $user = self::MODEL::query()->create([
            'first_name' => $dto->first_name,
            'last_name' => $dto->last_name,
            'email' => $dto->email,
            'phone' => $dto->phone,
            'image' => $imageName
        ]);

        return $user;
    }

    public function update(User $user, UserDto $dto): User
    {
        $imageName =  null;

        if ($dto->image && gettype($dto->image) == "string") {
            $imageName = $dto->image;
        }

        if ($dto->image && gettype($dto->image) == "object") {
            $this->deleteFile($user);
            $imageName =  $this->saveImage($dto->image);
        }

        $user->update([
            'first_name' => $dto->first_name,
            'last_name' => $dto->last_name,
            'email' => $dto->email,
            'phone' => $dto->phone,
            'image' => $imageName
        ]);

        return $user;
    }

    public function delete(User $user)
    {
        $this->deleteFile($user);
        return $user->delete();
    }

    public function saveImage(object $image): string
    {
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('images'), $imageName);
        return $imageName;
    }

    public function deleteFile(User $user)
    {
        if ($user->image && file_exists(public_path("images/$user->image"))) {
            unlink(public_path("images/$user->image"));
        }
    }
}
