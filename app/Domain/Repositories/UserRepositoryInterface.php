<?php

namespace Domain\Repositories;

use Domain\Entities\UserEntity;

interface UserRepositoryInterface
{
    public function save(UserEntity $user): UserEntity;
    public function findByEmail(string $email): ?UserEntity;
}
