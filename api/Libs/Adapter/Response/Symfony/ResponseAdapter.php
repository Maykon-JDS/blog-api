<?php

namespace Libs\Adapter\Response\Symfony;

use Symfony\Component\HttpFoundation\Response;
use Libs\Adapter\Response\ResponseInterface;

class ResponseAdapter implements ResponseInterface{

    private $response;

    public function __construct(){
        $this->response = new Response();
    }

    public function setContent($content){
        return $this->response->setContent($content);
    }

    public function setStatusCode($statusCode){
        return $this->response->setStatusCode($statusCode);
    }

    public function setHeader($name, $value){
        return $this->response->headers->set($name, $value);
    }

    public function send(){
        $this->response->send();
        exit;
    }
}