<?php

namespace Libs\Adapter\Dotenv\Symfony;

use Symfony\Component\Dotenv\Dotenv;
use Libs\Adapter\DotEnv\DotEnvInterface;

class DotEnvAdapter implements DotEnvInterface{

    protected $dotenv;

    public function __construct(){
        $this->dotenv = new Dotenv();
    }

    public function load(string $path) : void
    {
        $this->dotenv->load($path);
    }

    public function overload(string $path) : void
    {
        $this->dotenv->overload($path);
    }
    public function loadEnv(string $path) : void
    {
        $this->dotenv->loadEnv($path);
    }
}