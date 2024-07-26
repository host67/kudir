<?php

namespace App\Services;
use App\Dto\UserCreateDTO;

class UserService
{
    /**
     * Create a new class instance.
     */
    public function createUser(UserCreateDTO $userData)
    {
        // Создание пользователя с использованием данных из DTO
        return User::create([
            'name' => $userData->name,
            'email' => $userData->email,
            'password' => bcrypt($userData->password), // Не забудьте хэшировать пароль
        ]);
    }
}
