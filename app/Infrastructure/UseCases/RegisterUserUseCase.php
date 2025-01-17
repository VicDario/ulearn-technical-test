<?php

namespace Infrastructure\UseCases;

use Domain\DTOs\RegisterRequestDTO;
use Domain\Repositories\UserRepositoryInterface;
use Domain\Mappers\UserMapperInterface;
use Domain\Services\AuthServiceInterface;
use Infrastructure\Validators\EmailValidator;

class RegisterUserUseCase
{
    public function __construct(
        private UserRepositoryInterface $userRepository,
        private AuthServiceInterface $authService,
        private UserMapperInterface $userMapper,
    ) {}

    public function execute(RegisterRequestDTO $request): bool
    {
        try {
            EmailValidator::validate($request->email);
            $registeredUser = $this->userRepository->findByEmail($request->email);
            if ($registeredUser)
                throw new \DomainException('Email already exists');

            $request->password = $this->authService->hashPassword($request->password);
            $user = $this->userMapper->fromRegisterDTOToEntity($request);

            $this->userRepository->save($user);

            return true;
        } catch (\Exception $e) {
            throw new \DomainException($e->getMessage());
        }
    }
}
