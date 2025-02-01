<?php

namespace Middlewares;

use Libs\Adapter\Request\RequestInterface;

abstract class Handler
{
    protected ?Handler $next = null;

    abstract protected function process(RequestInterface $request) : void;

    abstract protected function breakChain() : void;


    public function __construct(Handler $handler = null)
    {

        if ($handler) {
            $this->setNext($handler);
        }

    }

    public function handle(RequestInterface $request) : void
    {

        $this->process($request);

        $this->callNextHandler($request);

    }

    protected function callNextHandler(RequestInterface $request) : void
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