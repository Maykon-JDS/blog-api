<?php

namespace Controllers;

use Controllers\Controller;

class HelloWorld extends Controller{
    public function index(){
        echo("Hello World");
    }

    public function pathParams($pathParameters, $queryParameters){

        extract($pathParameters);
        extract($queryParameters);

        echo("pathParams ID: " . $id . $n);
    }
}