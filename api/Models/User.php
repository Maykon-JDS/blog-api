<?php

namespace Models;

use DTO\UserDTO;
use Models\Model;
use Doctrine\ORM\EntityRepository;
use Entities\User as EntityUser;

class User extends Model
{

    // private $database = [];
    private EntityRepository $userRepository;

    public function __construct()
    {

        $this->userRepository = self::$entityManager->getRepository(EntityUser::class);
    }

    // TODO: Move to Repository
    public function getDTO(array $criteria): UserDTO|null
    {

        $userEntity = $this->userRepository->findOneBy($criteria);

        if (empty($userEntity)) {
            return null;
        }

        return UserDTO::createFromEntity($userEntity);
    }

    public function getOneBy(array $criteria): EntityUser|null
    {

        $userEntity = $this->userRepository->findOneBy($criteria);

        if (empty($userEntity)) {
            return null;
        }

        return $userEntity;
    }
}
