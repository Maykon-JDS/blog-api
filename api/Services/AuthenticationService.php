<?php

namespace Services;

use Services\Interface\Auth;
use Models\User;
use Models\FailedLogin;
use DTO\FailedLoginDTO;
use Exceptions\UserNotFoundException;
use stdClass;

class AuthenticationService implements Auth {

    static public function attempt($email, $password) {

        $userModel = new User();
        // $failedLoginModel = new FailedLogin();
        // $failedLoginStdClass = new stdClass();

        // $failedLoginStdClass->user = null;
        // $failedLoginStdClass->username = null;
        // $failedLoginStdClass->user_agent = $_SERVER['HTTP_USER_AGENT'];
        // $failedLoginStdClass->ip_address = $_SERVER["REMOTE_ADDR"];
        // $failedLoginStdClass->geo_location = 'Brazil';
        // $failedLoginStdClass->attempt_time = new \DateTime("now");

        $userDTO = $userModel->getDTO(["email" => $email]);

        if ($userDTO === null) {

            // $failedLoginStdClass->reason = "User not found";
            // $failedLoginDTO = FailedLoginDTO::createFromStdClass($failedLoginStdClass);
            // $failedLoginModel->insertDTO($failedLoginDTO);

            return false;

        }

        // TODO: Implement this
        if ($userDTO->password === $password) {

            $token = bin2hex(random_bytes(16));

            return $token;

        }

        // $failedLoginStdClass->user = $userModel->getOneBy(["id" => $userDTO->id]);
        // $failedLoginStdClass->reason = "Password incorrect";
        // $failedLoginDTO = FailedLoginDTO::createFromStdClass($failedLoginStdClass);
        // $failedLoginModel->insertDTO($failedLoginDTO);

        return false;

    }

    static public function check($token) {

        // if (!$token) {
        //     return false;
        // }

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