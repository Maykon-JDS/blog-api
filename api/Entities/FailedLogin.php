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
    private string $fk_users_id;

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

    #[ORM\Column(type: 'string')]
    private string $attempt_time;

    #[ORM\Column(type: 'datetime')]
    private string $created_at;

    #[ORM\Column(type: 'datetime')]
    private string $update_at;
}