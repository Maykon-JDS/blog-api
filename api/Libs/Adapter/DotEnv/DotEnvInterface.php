<?php


namespace Libs\Adapter\DotEnv;

interface DotEnvInterface {
    public function load(string $path);
    public function overload(string $path);
    public function loadEnv(string $path);
}