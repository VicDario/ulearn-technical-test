<?php

namespace Domain\DTOs;

class LoginRequestDTO
{
    public function __construct(
        public readonly string $email,
        public readonly string $password,
    ) {}
}
