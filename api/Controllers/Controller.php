<?php

namespace controllers;

abstract class Controller{


    protected function returnJson($data): void {

        // TODO: Implementar com o Adapter Response

        header_remove('Set-Cookie');

        header('Content-Type: application/json');

        header('Access-Control-Allow-Origin: *');

        echo json_encode($data);

    }


    public function __call($name, $arguments){

        // TODO: Implementar com o Adapter Response

        http_response_code(405);

        throw new \Exception('Method ' . $name . ' not exists');

    }


}