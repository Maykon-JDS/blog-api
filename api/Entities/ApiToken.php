<?php

namespace Entities;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Entities\User;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\HasLifecycleCallbacks;

#[ORM\Entity]
#[ORM\Table(name: 'api_tokens')]
#[HasLifecycleCallbacks]
class ApiToken extends Entity
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private int|null $id = null;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'apiTokens')]
    #[ORM\JoinColumn(name: 'fk_users_id', referencedColumnName: 'id', nullable: false)]
    private User $user;

    #[ORM\Column(type: 'string')]
    private string $token_type;

    #[ORM\Column(type: 'string')]
    private string $token_value;

    #[ORM\Column(type: 'boolean')]
    private bool $revoked;

    #[ORM\Column(type: 'datetime')]
    private DateTime $expiration_date;

    #[ORM\Column(type: 'string')]
    private string $description;

    #[ORM\Column(type: 'datetime')]
    private DateTime $created_at;

    #[ORM\Column(type: 'datetime')]
    private DateTime $update_at;

    #[ORM\PrePersist]
    #[ORM\PreUpdate]
    public function updatedDateTimes(): void
    {
        $this->setUpdateAt(new \DateTime('now'));
        if ($this->getCreatedAt() === null) {
            $this->setCreatedAt(new \DateTime('now'));
        }
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser() : User
    {
        return $this->user;
    }

    public function setUser(User $user) : void
    {
        $this->user = $user;
    }

    public function getTokenType() : string
    {
        return $this->token_type;
    }

    public function setTokenType($token_type) : void
    {
        $this->token_type = $token_type;
    }

    public function getTokenValue() : string
    {
        return $this->token_value;
    }

    public function setTokenValue($token_value) : void
    {
        $this->token_value = $token_value;
    }

    public function getRevoked() : bool
    {
        return $this->revoked;
    }

    public function setRevoked(bool $revoked) : void
    {
        $this->revoked = $revoked;
    }

    public function getExpirationDate() : DateTime
    {
        return $this->expiration_date;
    }

    public function setExpirationDate(DateTime $expiration_date) : void
    {
        $this->expiration_date = $expiration_date;
    }

    public function getDescription() : string
    {
        return $this->description;
    }

    public function setDescription($description) : void
    {
        $this->description = $description;
    }

    public function getCreatedAt() : DateTime
    {
        return $this->created_at;
    }

    public function setCreatedAt(DateTime $created_at) : void
    {
        $this->created_at = $created_at;
    }

    public function getUpdateAt() : DateTime
    {
        return $this->update_at;
    }

    public function setUpdateAt(DateTime $update_at) : void
    {
        $this->update_at = $update_at;
    }
}
