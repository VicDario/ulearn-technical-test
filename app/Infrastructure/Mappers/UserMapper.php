<?php

namespace Infrastructure\Mappers;

use Domain\DTOs\RegisterRequestDTO;
use Domain\DTOs\UserDTO;
use Domain\Entities\UserEntity;
use Domain\Mappers\UserMapperInterface;
use Infrastructure\Database\Models\User;

class UserMapper implements UserMapperInterface
{
    public function fromRegisterDtoToEntity(RegisterRequestDTO $dto): UserEntity
    {
        return (new UserEntity())
            ->setName($dto->name)
            ->setLastname($dto->lastname)
            ->setPhone($dto->phone)
            ->setPassword($dto->password)
            ->setEmail($dto->email);
    }

    public function fromEntityToDTO(UserEntity $entity): UserDTO
    {
        return new UserDTO($entity->getName(), $entity->getLastname(), $entity->getPhone(), $entity->getPhone());
    }

    public function fromModelToEntity(User $model): UserEntity
    {
        return (new UserEntity())
            ->setId($model->id)
            ->setName($model->name)
            ->setLastname($model->lastname)
            ->setPhone($model->phone)
            ->setEmail($model->email)
            ->setPassword($model->password);
    }
}
