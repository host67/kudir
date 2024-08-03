<?php

namespace App\Services;

use App\Models\User;
use App\Dto\UserCreateDTO;
use App\Dto\UserDeleteDTO;

class UserService
{
    /**
     * Create and save a new User
     *
     * @param UserCreateDTO $userData
     * @return User
     */
    public function createUser(UserCreateDTO $userData): User
    {
        $user = new User([
            'name' => $userData->name,
            'email' => $userData->email,
            'password' => bcrypt($userData->password),
        ]);

        $user->save();

        return $user;
    }

    /**
     * Delete User
     *
     * @param UserDeleteDTO $id
     * @return bool
     */
    public function deleteUser(UserDeleteDTO $id): bool
    {
        $user = User::findOrFail($id);

        return $user->delete();
    }
}
