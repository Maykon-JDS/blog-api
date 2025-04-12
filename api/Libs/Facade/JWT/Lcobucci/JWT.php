<?php

declare(strict_types=1);

namespace Libs\Facade\JWT\Lcobucci;

use Lcobucci\JWT\Encoding\ChainedFormatter;
use Lcobucci\JWT\Encoding\JoseEncoder;
use Lcobucci\JWT\Signer\Key\InMemory;
use Lcobucci\JWT\Signer\Hmac\Sha256;
use Lcobucci\JWT\Token\Builder;
use \DateTimeImmutable;

use Lcobucci\JWT\Token\Parser;
use Lcobucci\JWT\Token\Plain;
use Lcobucci\JWT\Validation\Validator;
use Lcobucci\JWT\Validation\Constraint\StrictValidAt;

use Lcobucci\JWT\Validation\Constraint\SignedWith;
use Lcobucci\JWT\Signer\Key;

use Libs\Facade\JWT\Lcobucci\Clock;

class JWT implements \Libs\Facade\JWT\JWT
{

    static private Key $signingKey;

    static private ?self $instance = null;

    // public function setSigningKey(string $key): void {}

    // public function getSigningKey(): string {}

    private function __construct()
    {

        self::$signingKey = InMemory::plainText($_ENV['JWT_SECRET']);

    }

    static public function getInstance(): JWT
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function issueToken(array $payload): string
    {

        $tokenBuilder = Builder::new(new JoseEncoder(), ChainedFormatter::default());
        $algorithm    = new Sha256();

        $now   = new DateTimeImmutable();
        $tokenBuilder = $tokenBuilder
            // Configures the issuer (iss claim)
            ->issuedBy($payload['iss'] ?? '')
            // Configures the audience (aud claim)
            ->permittedFor($payload['aud'] ?? '')
            // Configures the subject of the token (sub claim)
            ->relatedTo($payload['sub'] ?? '')
            // Configures the id (jti claim)
            ->identifiedBy($payload['jti'] ?? '')
            // Configures the time that the token was issue (iat claim)
            ->issuedAt($payload['iat'] ?? $now)
            // Configures the time that the token can be used (nbf claim)
            ->canOnlyBeUsedAfter($payload['nbf'] ?? $now)
            // Configures the expiration time of the token (exp claim)
            ->expiresAt($now->modify($payload['exp'] ?? '+1 minute'));


        // Configures a new claim, called "uid"
        // ->withClaim('uid', $payload['uid']);
        // Configures a new header, called "foo"

        // TODO: Implementy this method to add custom claims
        // foreach ($payload as $key => $value) {
        //     if (!in_array($key, ['iss', 'aud', 'sub', 'jti', 'exp'])) { // Evita sobrescrever claims padrões
        //         $tokenBuilder = $tokenBuilder->withClaim($key, $value);
        //     }
        // }

        // Builds a new token
        $token = $tokenBuilder->getToken($algorithm, self::$signingKey);

        return $token->toString();
    }

    public function parseToken(string $token): object
    {
        $parsedToken = $this->helperParseToken($token);

        $std = new \stdClass();

        $std->header = $parsedToken->headers()->all();
        $std->claims = $parsedToken->claims()->all();
        $std->signature = $parsedToken->signature()->toString();

        return $std;
    }

    public function validateToken($token): bool
    {

        $parsedToken = $this->helperParseToken($token);

        $validator = new Validator();

        // if (! $validator->validate($parsedToken, new SignedWith(new Sha256(), self::$signingKey))) {
        //     // echo 'Invalid token!', PHP_EOL; // will print this
        //     return false;
        // }

        // $strictValidAt = new StrictValidAt(new Clock());

        // try {
        //     $strictValidAt->assert($parsedToken);
        // } catch (\Exception $e) {
        //     echo $e->getMessage();
        // }



        if (! $validator->validate($parsedToken, new StrictValidAt(new Clock()))) {
            // echo 'Invalid token! StrictValidAt', PHP_EOL; // will print this
            return false;
        }

        return true;
    }

    public function parseTokenToArray(string $token): array
    {

        $parsedToken = $this->helperParseToken($token);

        $arr = ["header" => [], "claims" => [], "signature" => ""];

        $arr["header"] = $parsedToken->headers()->all();
        $arr["claims"] = $parsedToken->claims()->all();
        $arr["signature"] = $parsedToken->signature()->toString();

        return $arr;
    }


    // MTODO: Refactor this method
    private function helperParseToken($token): Plain
    {

        $parser = new Parser(new JoseEncoder());

        return $parser->parse($token);
    }
}
