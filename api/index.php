<?php

require_once "vendor/autoload.php";

use Core\Router;

// $array = array(
//     "HTTP_HOST (URL)" => $_SERVER['HTTP_HOST'],
//     "REQUEST_URI" => $_SERVER['REQUEST_URI'],
//     "REQUEST_URI (PREG)" => preg_split('#/+#', $_SERVER['REQUEST_URI'], PREG_SPLIT_NO_EMPTY),
//     "QUERY_STRING" => $_SERVER['QUERY_STRING'],
//     "REQUEST_METHOD" => $_SERVER['REQUEST_METHOD'],

// );

// echo ("<pre>");

// print_r($array);

// echo ("<pre>");

Router::get('/v1/helloworld', [Controllers\HelloWorld::class, 'index']);

Router::get('/v1', [Controllers\HelloWorld::class, 'teste']);

// Router::handleResponseCode(405, function () {});

// Router::get('/', [HelloWorld::class, '21']);

// Router::handleResponseCode(405, function () {

// });
// echo http_response_code();

// echo($teste);
