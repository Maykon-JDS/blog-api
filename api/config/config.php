<?php

namespace Config;

use Repositories\Repository;

require_once ROOT_PATH . "/Config/dotenv.php";
require_once ROOT_PATH . "/Config/doctrine.php";

Repository::setEntityManager($entityManager);
