<?php


namespace Libs\Adapter\Request;

interface RequestInterface {

    public function getContent();
    public function getAcceptableContentTypes();
    // public function getResponse();
    // public function getMethod();
    // public function getPathInfo();


}