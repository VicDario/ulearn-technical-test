<?php

namespace Domain\Services;

use Domain\DTOs\LoginRequestDTO;
use Domain\Entities\UserEntity;

interface AuthServiceInterface
{
    public function hashPassword(string $password): string;
    public function login(LoginRequestDTO $dto): bool;
    public function getAuthenticatedUser(): ?UserEntity;
}
