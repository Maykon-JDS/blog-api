<?php

namespace Middlewares;

use Middlewares\Handler;
use Libs\Adapter\Response\Response;
use Libs\Adapter\Request\RequestInterface;

class AcceptRequest extends Handler
{
    protected function process(RequestInterface $request): void
    {

        if ($request->getHeader('HTTP_ACCEPT') == 'application/json') {

            return;
        }

        $this->breakChain();
    }

    protected function breakChain(): void
    {
        $response = new Response();

        $response->setHeader('Content-Type', 'application/json');

        $response->setContent(json_encode(['Not Acceptable']));

        $response->setStatusCode(406);

        $response->send();
    }
}
