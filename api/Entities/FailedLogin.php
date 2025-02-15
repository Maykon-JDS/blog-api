<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;
use DateTime;
use Doctrine\ORM\Mapping\HasLifecycleCallbacks;
use Entities\User;

#[ORM\Entity]
#[ORM\Table(name: 'failed_logins')]
#[HasLifecycleCallbacks]
class FailedLogin extends Entity
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private int|null $id = null;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'failed_logins')]
    #[ORM\JoinColumn(name: 'fk_users_id', referencedColumnName: 'id', nullable: true)]
    private User|null $user;

    #[ORM\Column(type: 'string', nullable:true)]
    private string|null $username;

    #[ORM\Column(type: 'string')]
    private string $user_agent;

    #[ORM\Column(type: 'string')]
    private string $reason;

    #[ORM\Column(type: 'string')]
    private string $ip_address;

    #[ORM\Column(type: 'string')]
    private string|null $geo_location;

    #[ORM\Column(type: 'datetime')]
    private DateTime|null $attempt_time;

    #[ORM\Column(type: 'datetime')]
    private DateTime|null $created_at = null;

    #[ORM\Column(type: 'datetime')]
    private DateTime|null $update_at = null;

    #[ORM\PrePersist]
    #[ORM\PreUpdate]
    public function updatedDateTimes(): void
    {
        $this->setUpdateAt(new \DateTime('now'));
        if ($this->getCreatedAt() === null) {
            $this->setCreatedAt(new \DateTime('now'));
        }
    }

    public function getId() : ?int
    {
        return $this->id;
    }

    public function getUser() : ?User
    {
        return $this->user;
    }

    public function setUser(User|null $user): void
    {
        $this->user = $user;
    }

    public function getUsername() : string
    {
        return $this->username;
    }

    public function setUsername(string|null $username): void
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

    public function setGeoLocation(string|null $geo_location): void
    {
        $this->geo_location = $geo_location;
    }
    public function getAttemptTime() : DateTime|null
    {
        return $this->attempt_time;
    }

    public function setAttemptTime(DateTime $attempt_time): void
    {
        $this->attempt_time = $attempt_time;
    }
    public function getCreatedAt() : DateTime|null
    {
        return $this->created_at;
    }

    public function setCreatedAt(DateTime $created_at): void
    {
        $this->created_at = $created_at;
    }
    public function getUpdateAt() : DateTime|null
    {
        return $this->update_at;
    }

    public function setUpdateAt(DateTime $update_at): void
    {
        $this->update_at = $update_at;
    }
}
