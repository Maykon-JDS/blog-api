<?php

namespace Repositories;

use Doctrine\ORM\EntityManager;

abstract class Repository {

    static protected EntityManager $entityManager;

    public static function setEntityManager(EntityManager $entityManager) {

        if(!isset(self::$entityManager)) {

            self::$entityManager = $entityManager;

        }

    }

}