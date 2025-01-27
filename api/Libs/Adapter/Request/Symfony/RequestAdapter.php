<?php

namespace Libs\Adapter\Request\Symfony;

use Symfony\Component\HttpFoundation\Request;
use Libs\Adapter\Request\RequestInterface;

class RequestAdapter implements RequestInterface{

    private $request;

    public function __construct(){
        $this->request = new Request();
    }

    public function getContent(){
        return $this->request->getContent();
    }

    public function getAcceptableContentTypes(){
        return $this->request->getAcceptableContentTypes();
    }
}