<?php

namespace Services;

use Doctrine\Common\Lexer\Token;
use Libs\Facade\JWT\Lcobucci\JWT;
use Services\Interface\Auth;
use Repositories\UserRepository;
use DTO\UserDTO;

class AuthenticationService implements Auth
{

    private TokenService $tokenService;

    public function __construct()
    {
        $this->tokenService = new TokenService();
    }

    public function attempt($email, $password)
    {

        $userRepository = new UserRepository();

        $userEntity = $userRepository->findOneBy(["email" => $email]);

        if (empty($userEntity)) {

            throw new UserNotFoundException();
        }

        // $userDTO = UserDTO::createFromEntity($userEntity);

        if ($userEntity->getPassword() !== $password) {

            throw new IncorrectPasswordException();
        }

        // TODO: Implement this

        $payload = [
            'iss' => "teste",
            'aud' => "teste",
            'sub' => "{$userEntity->getId()}",
            // 'iat' => time(),
            'exp' => '+25 seconds',
            // 'uid' => $userDTO->id,
        ];

        $token = $this->tokenService->issueToken($payload);

        return $token;
    }

    public function check($token)
    {

        if (empty($token)) {
            return false;
        }

        $jwt = new JWT();
        echo "Token: " . $token . "\n";
        echo "teste: " . var_dump($jwt->validateToken($token));

        if ($jwt->validateToken($token)) {
            return true;
        }

        // $userModel = new User();

        // $usersDatabase = $userModel->getUsers();

        // $currentDate = new \DateTime();

        // $currentDateTimeStamp = $currentDate->getTimestamp();

        // foreach ($usersDatabase as $userDatabase) {
        //     if ($userDatabase->token === $token) {

        //         $tokenDate = new \DateTime($userDatabase->generated_at);

        //         $tokenExpirationTimeStamp = $tokenDate->getTimestamp() + $userDatabase->expiration;

        //         if ($currentDateTimeStamp < $tokenExpirationTimeStamp) {
        //             return true;
        //         }

        //         $userDatabase->token = null;
        //         $userDatabase->expiration = null;
        //         $userDatabase->generated_at = null;

        //         $userModel->updateUser($userDatabase->toArray());

        //     }
        // }

        return false;
    }
}

// TODO: Extract to a separete file or folder
class UserNotFoundException extends \Exception
{
    public function __construct(?\Throwable $previous = null)
    {
        $code = 0;
        $message = 'User not found';
        parent::__construct($message, $code, $previous);
    }
}

// TODO: Extract to a separete file or folder
class IncorrectPasswordException extends \Exception
{
    public function __construct(?\Throwable $previous = null)
    {
        $code = 0;
        $message = 'Incorrect Password';
        parent::__construct($message, $code, $previous);
    }
}
