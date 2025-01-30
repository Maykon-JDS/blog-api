<?php

namespace Middlewares;

use Middlewares\Handler;
use Libs\Adapter\Response\Response;
use Libs\Adapter\Request\RequestInterface;

class JsonRequest extends Handler
{
    protected function process(RequestInterface $request): void
    {

        if ($request->getHeader('Content_Type') == 'application/json') {

            return;
        }

        $this->breakChain();
    }

    protected function breakChain(): void
    {
        $response = new Response();

        $response->setHeader('Content-Type', 'application/json');

        $response->setContent(json_encode(['Unsupported Media Type']));

        $response->setStatusCode(415);

        $response->send();
    }
}
