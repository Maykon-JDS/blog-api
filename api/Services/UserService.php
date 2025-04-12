<?php

namespace Services;

use DTO\UserDTO;
use Repositories\UserRepository;
use Services\Interface\Service;
use Entities\User;
use Middlewares\Authentication;
use Services\Interface\Auth;

class UserService implements Service
{

    private AuthenticationService $authenticationService;

    private UserRepository $userRepository;

    public function __construct()
    {
        $this->authenticationService = new AuthenticationService();

        $this->userRepository = new UserRepository();

    }

    public function login(UserDTO $userDTO): string
    {

        $email = $userDTO->email ?? null;
        $password = $userDTO->password ?? null;

        try {

            $token = $this->authenticationService->attempt($email, $password);
            return $token;

        } catch (\Exception $e) {

            $failedLoginService = new FailedLoginService();
            $failedLoginService->register($userDTO, $e);

            throw $e;
        }

    }

    public function register(UserDTO $userDTO) : void
    {

        $user = self::createEntityFromDTO($userDTO);

        if ($this->userRepository->findOneBy(['email' => $user->getEmail()])) {
            throw new UserAlreadyExistsException();
        }

        if ($this->userRepository->findOneBy(['username' => $user->getUsername()])) {
            throw new UsernameAlreadyExistsException();
        }

        $this->userRepository->save($user);

    }

    static public function createEntityFromDTO(UserDTO $userDTO): User
    {
        $user = new User();

        $user->setUsername($userDTO->username ?? null);
        $user->setEmail($userDTO->email ?? null);
        $user->setPassword($userDTO->password ?? null);

        return $user;
    }
}

// TODO: Extract to a separete file or folder
class UserAlreadyExistsException extends \Exception
{
    public function __construct(?\Throwable $previous = null)
    {
        $code = 0;
        $message = 'User already exists';
        parent::__construct($message, $code, $previous);
    }
}

// TODO: Extract to a separete file or folder
class UsernameAlreadyExistsException extends \Exception
{
    public function __construct(?\Throwable $previous = null)
    {
        $code = 0;
        $message = 'Username already exists';
        parent::__construct($message, $code, $previous);
    }
}
