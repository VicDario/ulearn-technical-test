<?php

namespace Domain\Mappers;

use Domain\DTOs\RegisterRequestDTO;
use Domain\DTOs\UserDTO;
use Domain\Entities\UserEntity;
use Infrastructure\Database\Models\User;

interface UserMapperInterface {
    public function fromEntityToDTO(UserEntity $entity): UserDTO;
    public function fromRegisterDtoToEntity(RegisterRequestDTO $data): UserEntity;
    public function fromModelToEntity(User $data): UserEntity;
}
