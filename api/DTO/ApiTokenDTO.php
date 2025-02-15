<?php

namespace DTO;

use DateTime;
use Entities\ApiToken;
use Entities\Entity;
use Entities\FailedLogin;
use Entities\User;
use Exception;
use stdClass;

class ApiTokenDTO implements DTO
{

    public readonly int|null $id;
    public readonly User|null $user;
    public readonly string|null $token_type;
    public readonly string|null $token_value;
    public readonly bool|null $revoked;
    public readonly DateTime|null $expiration_date;
    public readonly string|null $description;
    public readonly DateTime|null $created_at;
    public readonly DateTime|null $update_at;


    static public function createFromStdClass(stdClass $apiToken) : self
    {

        $dto = new self();

        $dto->id = $apiToken->id ?? null;
        $dto->user = $apiToken->user ?? null;
        $dto->token_type = $apiToken->token_type ?? null;
        $dto->token_value = $apiToken->token_value ?? null;
        $dto->revoked = $apiToken->revoked ?? null;
        $dto->expiration_date = $apiToken->expiration_date ?? null;
        $dto->description = $apiToken->description ?? null;
        $dto->created_at = $apiToken->created_at ?? null;
        $dto->update_at = $apiToken->update_at ?? null;

        return $dto;

    }

    static public function createFromArray(array $apiToken) : self
    {

        $dto = new self();

        $dto->id = $apiToken['id'] ?? null;
        $dto->user = $apiToken['user'] ?? null;
        $dto->token_type = $apiToken['token_type'] ?? null;
        $dto->token_value = $apiToken['token_value'] ?? null;
        $dto->revoked = $apiToken['revoked'] ?? null;
        $dto->expiration_date = $apiToken['expiration_date'] ?? null;
        $dto->description = $apiToken['description'] ?? null;
        $dto->created_at = $apiToken['created_at'] ?? null;
        $dto->update_at = $apiToken['update_at'] ?? null;

        return $dto;

    }

    static public function createFromEntity(Entity $apiToken) : self
    {
        if (!$apiToken instanceof ApiToken) {
            throw new Exception('Invalid entity type.');
        }

        $dto = new self();

        $dto->id = $apiToken->getId() ?? null;
        $dto->user = $apiToken->getUser() ?? null;
        $dto->token_type = $apiToken->getTokenType() ?? null;
        $dto->token_value = $apiToken->getTokenValue() ?? null;
        $dto->revoked = $apiToken->getRevoked() ?? null;
        $dto->expiration_date = $apiToken->getExpirationDate() ?? null;
        $dto->description = $apiToken->getDescription() ?? null;
        $dto->created_at = $apiToken->getCreatedAt() ?? null;
        $dto->update_at = $apiToken->getUpdateAt() ?? null;

        return $dto;

    }

}