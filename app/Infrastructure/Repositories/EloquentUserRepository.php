<?php

namespace Infrastructure\Repositories;

use Domain\Entities\UserEntity;
use Domain\Mappers\UserMapperInterface;
use Domain\Repositories\UserRepositoryInterface;
use Infrastructure\Database\Models\User;

class EloquentUserRepository implements UserRepositoryInterface
{
    public function __construct(
        private UserMapperInterface $userMapper,
    )
    {}

    public function save(UserEntity $user): UserEntity
    {
        $model = User::create([
            'name' => $user->getName(),
            'lastname' => $user->getLastname(),
            'phone' => $user->getPhone(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
        ]);

        return $this->userMapper->fromModelToEntity($model);
    }

    public function findByEmail(string $email): ?UserEntity
    {
        $model = User::where('email', $email)->first();
        return $model ? $this->userMapper->fromModelToEntity($model) : null;
    }
}
