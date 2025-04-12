<?php

namespace Repositories;

use DTO\FailedLoginDTO;
use Repositories\Repository;
use Doctrine\ORM\EntityRepository;
use Entities\FailedLogin as FailedLoginEntity;

class FailedLoginRepository extends Repository {

    private EntityRepository $failedLoginRepository;

    public function __construct() {

        $this->failedLoginRepository = self::$entityManager->getRepository(FailedLoginEntity::class);

    }

    // TODO: Move to Repository
    public function getDTO(array $criteria):FailedLoginDTO|null
    {

        $failedLoginEntity = $this->failedLoginRepository->findOneBy($criteria);

        if(empty($failedLoginEntity)) {
            return null;
        }

        return FailedLoginDTO::createFromEntity($failedLoginEntity);

    }

    public function insertDTO(FailedLoginDTO $failedLoginDTO) : void
    {

        $failedLoginEntity = new FailedLoginEntity();

        $failedLoginEntity->setUser($failedLoginDTO->user);
        $failedLoginEntity->setUsername($failedLoginDTO->username);
        $failedLoginEntity->setUserAgent($failedLoginDTO->user_agent);
        $failedLoginEntity->setReason($failedLoginDTO->reason);
        $failedLoginEntity->setIpAddress($failedLoginDTO->ip_address);
        $failedLoginEntity->setGeoLocation($failedLoginDTO->geo_location);
        $failedLoginEntity->setAttemptTime($failedLoginDTO->attempt_time);

        self::$entityManager->persist($failedLoginEntity);
        self::$entityManager->flush();
    }

}