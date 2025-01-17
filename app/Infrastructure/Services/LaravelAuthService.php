<?php

namespace Infrastructure\Services;

use Domain\DTOs\LoginRequestDTO;
use Domain\Entities\UserEntity;
use Domain\Mappers\UserMapperInterface;
use Domain\Services\AuthServiceInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LaravelAuthService implements AuthServiceInterface
{
    public function __construct(
        private UserMapperInterface $userMapper,
    ) {}

    public function hashPassword(string $password): string
    {
        return Hash::make($password);
    }

    public function login(LoginRequestDTO $dto): bool
    {
        return Auth::attempt(['email' => $dto->email, 'password' => $dto->password]);
    }

    public function getAuthenticatedUser(): ?UserEntity
    {
        $user = Auth::user();
        return $user ? $this->userMapper->fromModelToEntity($user) : null;
    }
}
