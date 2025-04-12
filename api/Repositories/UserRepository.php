<?php

namespace Repositories;

use DTO\UserDTO;
use Repositories\Repository;
use Doctrine\ORM\EntityRepository;
use Entities\User;

class UserRepository extends Repository
{

    private EntityRepository $userRepository;

    public function __construct()
    {

        $this->userRepository = self::$entityManager->getRepository(User::class);
    }

    public function save(User $user): void
    {

        self::$entityManager->persist($user);
        self::$entityManager->flush();

    }

    public function findOneBy(array $criteria, ?array $orderBy = null): User|null
    {

        return $this->userRepository->findOneBy($criteria, $orderBy);
    }

}
