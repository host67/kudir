<?php

namespace App\Dto;

final readonly class UserCreateDTO
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
    ) {
    }
}
