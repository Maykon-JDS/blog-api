<?php


namespace Libs\Adapter\Response;

interface ResponseInterface {

    public function setStatusCode($statusCode);
    public function setContent($content);
    public function send();
    // public function prepare();
    // public function getPathInfo();


}