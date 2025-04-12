<?php

namespace Services;

use DTO\UserDTO;
use DTO\FailedLoginDTO;
use Repositories\FailedLoginRepository;
use Services\Interface\Service;
use Throwable;

class FailedLoginService implements Service {

    private FailedLoginRepository $failedLoginRepository;

    public function __construct()
    {
        $this->failedLoginRepository = new FailedLoginRepository();

    }

    // TODO: Generalizar Erro
    public function register(UserDTO $userDTO, \Exception $exeption) : void
    {
        $failedLoginStdClass = new \stdClass();

        $failedLoginStdClass->user = null;
        $failedLoginStdClass->username = null;
        $failedLoginStdClass->user_agent = $_SERVER['HTTP_USER_AGENT'];
        $failedLoginStdClass->ip_address = $_SERVER["REMOTE_ADDR"];
        $failedLoginStdClass->geo_location = 'Brazil';
        $failedLoginStdClass->attempt_time = new \DateTime("now");

        $reason = $exeption->getMessage() ?? null;

        $failedLoginStdClass->reason = $reason;
        $failedLoginDTO = FailedLoginDTO::createFromStdClass($failedLoginStdClass);
        $this->failedLoginRepository->insertDTO($failedLoginDTO);
    }

}