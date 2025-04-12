<?php


namespace Libs\Adapter\Response;

interface ResponseInterface {

    public function setHeader(string $name, string $value);
    public function setStatusCode($statusCode);
    public function setContent($content);
    public function setCookie($name, $value);
    public function sendJson();
    public function send();
    // public function prepare();
    // public function getPathInfo();

}