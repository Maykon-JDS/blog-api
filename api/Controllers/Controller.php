<?php

namespace controllers;

abstract class Controller{


    protected function returnJson($data): void {

        header_remove('Set-Cookie');

        header('Content-Type: application/json');

        header('Access-Control-Allow-Origin: *');

        echo json_encode($data);

    }


    public function __call($name, $arguments){

        http_response_code(405);

        throw new \Exception('Method ' . $name . ' not exists');

    }


}