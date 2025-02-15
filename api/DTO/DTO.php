<?php

namespace DTO;

use Entities\Entity;
use stdClass;

interface DTO
{

    static public function createFromStdClass(stdClass $user) : self;
    static public function createFromArray(array $user) : self;
    static public function createFromEntity(Entity $user) : self;

}