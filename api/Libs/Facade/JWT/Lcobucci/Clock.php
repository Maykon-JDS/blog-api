<?php

namespace Libs\Facade\JWT\Lcobucci;

use Psr\Clock\ClockInterface;

class Clock implements ClockInterface
{
    public function now(): \DateTimeImmutable
    {
        return new \DateTimeImmutable();
    }

}