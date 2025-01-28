<?php


namespace DTOs;

class User
{
    public $id;
    public $username;
    public $password;
    public $email;
    public $token;
    public $expiration;
    public $generated_at;


    public function __construct($record)
    {
        $this->id = $record['id'] ?? null;
        $this->username = $record['username'] ?? null;
        $this->password = $record['password'] ?? null;
        $this->email = $record['email'] ?? null;
        $this->token = $record['token'] ?? null;
        $this->expiration = $record['expiration'] ?? null;
        $this->generated_at = $record['generated_at'] ?? null;
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'username' => $this->username,
            'password' => $this->password,
            'email' => $this->email,
            'token' => $this->token,
            'expiration' => $this->expiration,
            'generated_at' => $this->generated_at,
        ];
    }
}