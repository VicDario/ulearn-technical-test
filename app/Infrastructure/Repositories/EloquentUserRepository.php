<?php

namespace Infrastructure\Repositories;

use Domain\Entities\UserEntity;
use Domain\Repositories\UserRepositoryInterface;
use Infrastructure\Database\Models\User;

class EloquentUserRepository implements UserRepositoryInterface
{
    public function save(UserEntity $user): UserEntity
    {
        $model = User::create([
            'name' => $user->getName(),
            'lastname' => $user->getLastname(),
            'phone' => $user->getPhone(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
        ]);

        return $this->mapToEntity($model);
    }

    public function findByEmail(string $email): ?UserEntity
    {
        $model = User::where('email', $email)->first();
        return $model ? $this->mapToEntity($model) : null;
    }

    private function mapToEntity(User $model): UserEntity
    {
        return new UserEntity(
            $model->name,
            $model->lastname,
            $model->phone,
            $model->email,
            $model->password
        );
    }
}
