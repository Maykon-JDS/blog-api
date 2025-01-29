<?php

namespace Middlewares;

use Middlewares\Handler;
use Services\Authentication as Auth;
use Libs\Adapter\Response\Response;

class Authentication extends Handler
{
    protected function process($request): void
    {

        if (Auth::check($request)) {

            return;
        }

        $this->breakChain();
    }

    protected function breakChain(): void
    {
        $response = new Response();

        $response->setHeader('Content-Type', 'application/json');

        $response->setContent(json_encode(['Não Autenticado']));

        $response->setStatusCode(401);

        $response->send();
    }
}
