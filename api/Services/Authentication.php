<?php

namespace Services;

use Services\Interface\Authentication as Auth;
use Models\User;

class Authentication implements Auth {

    static public function attempt($username, $password) {

        $userModel = new User();

        $usersDatabase = $userModel->getUsers();

        foreach ($usersDatabase as $userDatabase) {
            if ($userDatabase->username === $username && $userDatabase->password === $password) {
                $token = bin2hex(random_bytes(16));
                $userDatabase->token = $token;
                $userDatabase->expiration = 60;
                $userDatabase->generated_at = date('Y-m-d H:i:s');
                $userModel->updateUser($userDatabase->toArray());

                return $userDatabase->token;
            }
        }

        return false;

    }

    static public function check($token) {

        if (!$token) {
            return false;
        }

        $userModel = new User();

        $usersDatabase = $userModel->getUsers();

        $currentDate = new \DateTime();

        $currentDateTimeStamp = $currentDate->getTimestamp();

        foreach ($usersDatabase as $userDatabase) {
            if ($userDatabase->token === $token) {

                $tokenDate = new \DateTime($userDatabase->generated_at);

                $tokenExpirationTimeStamp = $tokenDate->getTimestamp() + $userDatabase->expiration;

                if ($currentDateTimeStamp < $tokenExpirationTimeStamp) {
                    return true;
                }

                $userDatabase->token = null;
                $userDatabase->expiration = null;
                $userDatabase->generated_at = null;

                $userModel->updateUser($userDatabase->toArray());

            }
        }

        return false;

    }

}