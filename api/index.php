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


Router::get('/api/v1/porcentage/porcentage', [Controllers\Percentage::class, 'percentage']);

Router::get('/api/v1/porcentage/simple-interest', [Controllers\Percentage::class, 'simpleInterest']);

Router::get('/api/v1/porcentage/compound-interest', [Controllers\Percentage::class, 'compoundInterest']);

Router::get('/api/v1/porcentage/percentage-increase', [Controllers\Percentage::class, 'percentageIncrease']);

Router::get('/api/v1/porcentage/percentage-decrease', [Controllers\Percentage::class, 'percentageDecrease']);

Router::get('/api/v1/porcentage/successive-equal-percentage-increases', [Controllers\Percentage::class, 'successiveEqualPercentageIncreases']);

Router::get('/api/v1/porcentage/successive-equal-percentage-decrease', [Controllers\Percentage::class, 'successiveEqualPercentageDecrease']);


Router::get('/api/v1/verify/{teste}', [Controllers\TestAPI::class, 'verifyGET']);

Router::post('/api/v1/verify/{teste}', [Controllers\TestAPI::class, 'verifyPOST']);

Router::put('/api/v1/verify/{teste}', [Controllers\TestAPI::class, 'verifyPUT']);

Router::delete('/api/v1/verify/{teste}', [Controllers\TestAPI::class, 'verifyDELETE']);

Router::patch('/api/v1/verify/{teste}', [Controllers\TestAPI::class, 'verifyPATCH']);

Router::options('/api/v1/verify/{teste}', [Controllers\TestAPI::class, 'verifyOPTIONS']);



// });
// echo http_response_code();

// echo($teste);
