<?php

namespace Core;

require_once __DIR__ . "/../Config/config.php";
require_once ROOT_PATH . "/vendor/autoload.php";

use \Libs\Adapter\DotEnv\DotEnv;

$dotenv = new DotEnv();
$dotenv->load(ROOT_PATH . "/.env");