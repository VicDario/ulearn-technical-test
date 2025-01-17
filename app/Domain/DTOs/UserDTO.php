<?php

namespace Domain\DTOs;

class UserDTO
{
    public function __construct(
        public readonly string $name,
        public readonly string $lastname,
        public readonly string $phone,
        public readonly string $email
    ) {}
}
