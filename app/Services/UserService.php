<?php

namespace App\Services;

use App\Models\User;
use App\Dto\UserCreateDTO;

class UserService
{
    /**
     * Create and save a new User
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
}
