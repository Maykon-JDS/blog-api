<?php


namespace Libs\Adapter\Request;

interface RequestInterface {

    public function getContent();
    public function getAcceptableContentTypes();
    public function getHeader(string $name);
}