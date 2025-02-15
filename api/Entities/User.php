<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\HasLifecycleCallbacks;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use DateTime;

#[ORM\Entity]
#[ORM\Table(name: 'users')]
#[HasLifecycleCallbacks]
class User
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private int|null $id = null;

    #[ORM\Column(type: 'string', unique: true, nullable: false)]
    private string $username;

    #[ORM\Column(type: 'string')]
    private string $password;

    #[ORM\Column(type: 'string', unique: true, nullable: false)]
    private string $email;

    #[ORM\Column(type: 'datetime', nullable: false)]
    private DateTime|null $created_at = null;

    #[ORM\Column(type: 'datetime', nullable: false)]
    private DateTime|null $update_at = null;

    #[ORM\OneToMany(targetEntity: ApiToken::class, mappedBy: 'user')]
    private Collection $api_tokens;

    #[ORM\OneToMany(targetEntity: FailedLogin::class, mappedBy: 'user')]
    private Collection $failed_logins;

    #[ORM\PrePersist]
    #[ORM\PreUpdate]
    public function updatedDateTimes(): void
    {
        $this->setUpdateAt(new \DateTime('now'));
        if ($this->getCreatedAt() === null) {
            $this->setCreatedAt(new \DateTime('now'));
        }
    }

    public function getApiTokens() : Collection
    {
        return $this->api_tokens;
    }

    public function getFailedLogins() : Collection
    {
        return $this->failed_logins;
    }

    public function getId() : ?int
    {
        return $this->id;
    }

    public function getUsername() : string
    {
        return $this->username;
    }

    public function setUsername(string $username) : void
    {
        $this->username = $username;
    }

    public function getPassword() : string
    {
        return $this->password;
    }

    public function setPassword(string $password) : void
    {
        $this->password = $password;
    }

    public function getEmail() : string
    {
        return $this->email;
    }

    public function setEmail(string $email) : void
    {
        $this->email = $email;
    }

    public function getCreatedAt() : DateTime|null
    {
        return $this->created_at;
    }

    public function setCreatedAt(DateTime $created_at) : void
    {
        $this->created_at = $created_at;
    }

    public function getUpdateAt() : DateTime|null
    {
        return $this->update_at;
    }

    public function setUpdateAt(DateTime $update_at) : void
    {
        $this->update_at = $update_at;
    }

}