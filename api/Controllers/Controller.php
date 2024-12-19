<?php

namespace controllers;

abstract class Controller{


    protected function getStringParams(): array {

        return [];

    }


    public function __call($name, $arguments){

        http_response_code(405);

        throw new \Exception('Method ' . $name . ' not exists');

    }


}