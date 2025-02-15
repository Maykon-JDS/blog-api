<?php

namespace DTO;

use DateTime;
use Entities\Entity;
use Entities\FailedLogin;
use Entities\User;
use Exception;
use stdClass;

class FailedLoginDTO implements DTO
{

    public readonly int|null $id;
    public readonly User|null $user;
    public readonly string|null $username;
    public readonly string|null $user_agent;
    public readonly string|null $reason;
    public readonly string|null $ip_address;
    public readonly string|null $geo_location;
    public readonly DateTime|null $attempt_time;
    public readonly DateTime|null $created_at;
    public readonly DateTime|null $update_at;

    static public function createFromStdClass(stdClass $data) : self
    {

        $dto = new self();

        $dto->id = $data->id ?? null;
        $dto->user = $data->user ?? null;
        $dto->username = $data->username ?? null;
        $dto->user_agent = $data->user_agent ?? null;
        $dto->reason = $data->reason ?? null;
        $dto->ip_address = $data->ip_address ?? null;
        $dto->geo_location = $data->geo_location ?? null;
        $dto->attempt_time = $data->attempt_time ?? null;
        $dto->created_at = $data->created_at ?? null;
        $dto->update_at = $data->update_at ?? null;

        return $dto;

    }

    static public function createFromArray(array $data) : self
    {

        $dto = new self();

        $dto->id = $data['id'] ?? null;
        $dto->user = $data['user'] ?? null;
        $dto->user_agent = $data['user_agent'] ?? null;
        $dto->reason = $data['reason'] ?? null;
        $dto->ip_address = $data['ip_address'] ?? null;
        $dto->geo_location = $data['geo_location'] ?? null;
        $dto->attempt_time = $data['attempt_time'] ?? null;
        $dto->created_at = $data['created_at'] ?? null;
        $dto->update_at = $data['update_at'] ?? null;

        return $dto;

    }

    static public function createFromEntity(Entity $failedLogin) : self
    {
        if (!$failedLogin instanceof FailedLogin) {
            throw new Exception('Invalid entity type.');
        }

        $dto = new self();

        $dto->id = $failedLogin->getId() ?? null;
        $dto->user = $failedLogin->getUser() ?? null;
        $dto->user_agent = $failedLogin->getUserAgent() ?? null;
        $dto->reason = $failedLogin->getReason() ?? null;
        $dto->ip_address = $failedLogin->getIpAddress() ?? null;
        $dto->geo_location = $failedLogin->getGeoLocation() ?? null;
        $dto->attempt_time = $failedLogin->getAttemptTime() ?? null;
        $dto->created_at = $failedLogin->getCreatedAt() ?? null;
        $dto->update_at = $failedLogin->getUpdateAt() ?? null;

        return $dto;

    }

}