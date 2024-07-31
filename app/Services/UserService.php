<?php

namespace App\Services;

use App\Models\User;
use App\Dto\UserCreateDTO;

class UserService
{
    /**
     * Create and save a new User
     *
     * @param UserCreateDTO $userData
     * @return User
     * @throws \Exception
     */
    public function createUser(UserCreateDTO $userData): User
    {
        try {
            $this->checkIfUserExists($userData->email);

            $user = new User([
                'name' => $userData->name,
                'email' => $userData->email,
                'password' => bcrypt($userData->password),
            ]);

            $user->save();

            return $user;
        } catch (\Exception $e) {
            throw new \Exception("Ошибка при создании пользователя. " . $e->getMessage(), 403, $e);
        }
    }

    /**
     * Checks the existence of a user by email
     *
     * @param string $email
     * @throws \Exception if user exists
     */
    private function checkIfUserExists(string $email): void
    {
        $exists = User::where('email', $email)->exists();

        if ($exists) {
            throw new \Exception("Пользователь с таким email уже существует.");
        }
    }
}
