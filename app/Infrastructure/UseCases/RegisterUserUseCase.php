<?php

namespace Infrastructure\UseCases;

use Domain\DTOs\RegisterRequestDTO;
use Domain\Repositories\UserRepositoryInterface;
use Domain\Entities\UserEntity;
use Domain\Services\AuthServiceInterface;
use EmailValidator;

class RegisterUserUseCase
{
    public function __construct(
        private UserRepositoryInterface $userRepository,
        private AuthServiceInterface $authService
    ) {}

    public function execute(RegisterRequestDTO $request): bool
    {
        try {
            EmailValidator::validate($request->email);
            $registeredUser = $this->userRepository->findByEmail($request->email);
            if ($registeredUser)
                throw new \DomainException('Email already exists');

            $hashedPassword = $this->authService->hashPassword($request->password);
            $user = new UserEntity(
                $request->name,
                $request->lastname,
                $request->phone,
                $request->email,
                $hashedPassword,
            );

            $this->userRepository->save($user);

            return true;
        } catch (\Exception $e) {
            throw new \DomainException($e->getMessage());
        }
    }
}
