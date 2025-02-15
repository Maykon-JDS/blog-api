<?php

namespace DTO;

use DateTime;
use Entities\Entity;
use Entities\User;
use Exception;
use stdClass;

class UserDTO implements DTO
{

    public readonly int|null $id;
    public readonly string|null $username;
    public readonly string|null $password;
    public readonly string|null $email;
    public readonly DateTime|null $created_at;
    public readonly DateTime|null $update_at;

    static public function createFromStdClass(stdClass $user) : self
    {

        $dto = new self();

        $dto->id = $user->id ?? null;
        $dto->username = $user->username ?? null;
        $dto->password = $user->password ?? null;
        $dto->email = $user->email ?? null;
        $dto->created_at = $user->created_at ?? null;
        $dto->update_at = $user->update_at ?? null;

        return $dto;

    }

    static public function createFromArray(array $user) : self
    {

        $dto = new self();

        $dto->id = $user['id'] ?? null;
        $dto->username = $user['username'] ?? null;
        $dto->password = $user['password'] ?? null;
        $dto->email = $user['email'] ?? null;
        $dto->created_at = $user['created_at'] ?? null;
        $dto->update_at = $user['update_at'] ?? null;

        return $dto;

    }

    static public function createFromEntity(Entity $user) : self
    {

        if (!$user instanceof User) {
            throw new Exception('Invalid entity type.');
        }

        $dto = new self();

        $dto->id = $user->getId() ?? null;
        $dto->username = $user->getUsername() ?? null;
        $dto->password = $user->getPassword() ?? null;
        $dto->email = $user->getEmail() ?? null;
        $dto->created_at = $user->getCreatedAt() ?? null;
        $dto->update_at = $user->getUpdateAt() ?? null;

        return $dto;

    }

}