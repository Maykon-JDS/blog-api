<?php

namespace Middlewares;

use Middlewares\Handler;
use Libs\Adapter\Response\Response;

class Teste extends Handler
{
    protected function process($request): void
    {

        if($request == 'valido') {

            $this->breakChain();

        }

    }

    protected function breakChain(): void
    {
        $response = new Response();

        $response->setHeader('Content-Type', 'application/json');

        $response->setContent(json_encode(['Teste']));

        $response->setStatusCode(401);

        $response->send();

        exit;
    }

}