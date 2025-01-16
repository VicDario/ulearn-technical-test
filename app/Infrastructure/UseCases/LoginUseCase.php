<?php

namespace Infrastructure\UseCases;

use Domain\DTOs\LoginRequestDTO;
use Domain\DTOs\LoginResponseDTO;
use Domain\DTOs\UserDTO;
use Domain\Repositories\UserRepositoryInterface;
use Domain\Services\AuthServiceInterface;
use EmailValidator;

class LoginUserUseCase
{
    public function __construct(
        private UserRepositoryInterface $userRepository,
        private AuthServiceInterface $authService
    ) {}

    public function execute(LoginRequestDTO $request): LoginResponseDTO
    {
        try {
            EmailValidator::validate($request->email);

            $isValid = $this->authService->login($request);
            if (!$isValid) throw new \DomainException('Invalid credentials');

            $user = $this->authService->getAuthenticatedUser();
            if (!$user)
                throw new \DomainException('Error getting user');

            return LoginResponseDTO::success(
                UserDTO::fromEntity($user),
            );
        } catch (\Exception $e) {
            return LoginResponseDTO::failure($e->getMessage());
        }
    }
}
