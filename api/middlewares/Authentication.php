<?php

namespace Middlewares;

use Middlewares\Handler;
use Services\Authentication as Auth;
use Libs\Adapter\Response\Response;
use Libs\Adapter\Request\RequestInterface;


class Authentication extends Handler
{
    protected function process(RequestInterface $request): void
    {

        $contentJson = $request->getContent();

        $content = json_decode($contentJson, true);

        $token = $content['token'] ?? null;

        if (Auth::check($token)) {

            return;
        }

        $this->breakChain();
    }

    protected function breakChain(): void
    {
        $response = new Response();

        $response->setHeader('Content-Type', 'application/json');

        $response->setContent(json_encode(['Unauthorized']));

        $response->setStatusCode(401);

        $response->send();
    }
}
