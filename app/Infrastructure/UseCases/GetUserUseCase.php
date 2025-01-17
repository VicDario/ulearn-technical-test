<?php

namespace Infrastructure\UseCases;

use Domain\DTOs\UserDTO;
use Domain\Mappers\UserMapperInterface;
use Domain\Services\AuthServiceInterface;

class GetUserUseCase
{
    public function __construct(
        private UserMapperInterface $userMapper,
        private AuthServiceInterface $authService,
    ) {}

    public function execute(): UserDTO
    {
        $user = $this->authService->getAuthenticatedUser();
        if (!$user)
            throw new \DomainException('User not found');

        return $this->userMapper->fromEntityToDTO($user);
    }
}
