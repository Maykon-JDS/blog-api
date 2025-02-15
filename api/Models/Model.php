<?php

namespace Models;

use Doctrine\ORM\EntityManager;

abstract class Model {

    static protected EntityManager $entityManager;

    public static function setEntityManager(EntityManager $entityManager) {

        if(!isset(self::$entityManager)) {

            self::$entityManager = $entityManager;

        }

    }

}