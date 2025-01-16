<?php

namespace Domain\DTOs;

class LoginResponseDTO
{
    public function __construct(
        public readonly bool $success,
        public readonly ?UserDTO $user = null,
        public readonly ?string $error = null
    ) { }

    public static function success(UserDTO $user): self
    {
        return new self(
            success: true,
            user: $user
        );
    }

    public static function failure(string $error): self
    {
        return new self(
            success: false,
            error: $error
        );
    }
}
