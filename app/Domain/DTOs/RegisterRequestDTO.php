<?php

namespace Domain\DTOs;

class RegisterRequestDTO
{
    public function __construct(
        public readonly string $name,
        public readonly string $lastname,
        public readonly string $phone,
        public readonly string $email,
        public string $password
    ) {}

}
