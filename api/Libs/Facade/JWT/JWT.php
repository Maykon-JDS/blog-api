<?php

namespace Libs\Facade\JWT;

interface JWT {

    //MTODO: Acaber de implementar a interface

    // InMemory::plainText(random_bytes(32));
    // public function setSigningKey(string $key) : void;

    // public function getSigningKey() : string;

    // $algorithm    = new Sha256();
    // public function setAlgorithm() : void;

    // public function getAlgorithm() : string;

    // public function setConfiguration() : void;


    public function parseTokenToArray(string $token) : array;

    public function issueToken(array $payload) : string;

    public function parseToken(string $token) : object;

}