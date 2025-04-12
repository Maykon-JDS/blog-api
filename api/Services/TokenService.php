<?php

namespace Services;

use Services\Interface\Service;
use Libs\Facade\JWT\Lcobucci\JWT;

class TokenService implements Service
{

    private JWT $jwt;

    public function __construct()
    {
        $this->jwt = JWT::getInstance();
    }

    public function issueToken(array $payload): string
    {
        return $this->jwt->issueToken($payload);
    }

    public function validateToken($token) : bool
    {

        return $this->jwt->validateToken($token);
    }
}
