<?php

namespace Middlewares;

abstract class Handler
{
    protected ?Handler $next = null;

    abstract protected function process($request) : void;

    abstract protected function breakChain() : void;


    public function __construct(Handler $handler = null)
    {

        if ($handler) {
            $this->setNext($handler);
        }

    }

    public function handle($request) : void
    {
        $this->process($request);

        $this->callNextHandler($request);

    }

    protected function callNextHandler($request) : void
    {

        if ($this->next) {
            $this->next->handle($request);
        }

    }

    public function setNext(Handler $handler) : void
    {
        $this->next = $handler;

    }

    public function chain(Handler $handler) : Handler
    {

        $this->setNext($handler);

        return $handler;

    }

}