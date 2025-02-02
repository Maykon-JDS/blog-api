<?php
// src/Product.php

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'failed_logins')]
class FailedLogin
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private int|null $id = null;

    #[ORM\Column(type: 'integer')]
    private int $fk_users_id;

    #[ORM\Column(type: 'string')]
    private string $username;

    #[ORM\Column(type: 'string')]
    private string $user_agent;

    #[ORM\Column(type: 'string')]
    private string $reason;

    #[ORM\Column(type: 'string')]
    private string $ip_address;

    #[ORM\Column(type: 'string')]
    private string $geo_location;

    #[ORM\Column(type: 'datetime')]
    private DateTime $attempt_time;

    #[ORM\Column(type: 'datetime')]
    private DateTime $created_at;

    #[ORM\Column(type: 'datetime')]
    private DateTime $update_at;

    public function getId() : ?int
    {
        return $this->id;
    }

    public function getFkUsersId() : ?int
    {
        return $this->fk_users_id;
    }

    public function setFkUsersId(int $fk_users_id): void
    {
        $this->fk_users_id = $fk_users_id;
    }
    public function getUsername() : string
    {
        return $this->username;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function getUserAgent() : string
    {
        return $this->user_agent;
    }

    public function setUserAgent(string $user_agent): void
    {
        $this->user_agent = $user_agent;
    }
    public function getReason() : string
    {
        return $this->reason;
    }

    public function setReason(string $reason): void
    {
        $this->reason = $reason;
    }
    public function getIpAddress() : string
    {
        return $this->ip_address;
    }

    public function setIpAddress(string $ip_address): void
    {
        $this->ip_address = $ip_address;
    }
    public function getGeoLocation() : string
    {
        return $this->geo_location;
    }

    public function setGeoLocation(string $geo_location): void
    {
        $this->geo_location = $geo_location;
    }
    public function getAttemptTime() : DateTime
    {
        return $this->attempt_time;
    }

    public function setAttemptTime(DateTime $attempt_time): void
    {
        $this->attempt_time = $attempt_time;
    }
    public function getCreatedAt() : DateTime
    {
        return $this->created_at;
    }

    public function setCreatedAt(DateTime $created_at): void
    {
        $this->created_at = $created_at;
    }
    public function getUpdateAt() : DateTime
    {
        return $this->update_at;
    }

    public function setUpdateAt(DateTime $update_at): void
    {
        $this->update_at = $update_at;
    }
}
