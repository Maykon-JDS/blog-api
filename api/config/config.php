<?php

namespace Config;

use Models\Model;

require_once ROOT_PATH . "/Config/dotenv.php";
require_once ROOT_PATH . "/Config/doctrine.php";

Model::setEntityManager($entityManager);
