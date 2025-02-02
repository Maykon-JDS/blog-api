<?php

namespace Config;

use \Libs\Adapter\DotEnv\DotEnv;

$dotenv = new DotEnv();
$dotenv->load(ROOT_PATH . "/.env");
