<?php

namespace App\Dto;

final readonly class UserDeleteDTO
{
    public function __construct(public int $id)
    {
    }
}
