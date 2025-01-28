<?php

require_once "vendor/autoload.php";

use Core\Router;

use Stichoza\GoogleTranslate\GoogleTranslate;
// use Core\FactoryMethods\RequestBodyParamsHandlerFactory\RequestBodyParamsHandlerFactory;

 // Translates into English

// $array = array(
//     "HTTP_HOST (URL)" => $_SERVER['HTTP_HOST'],
//     "REQUEST_URI" => $_SERVER['REQUEST_URI'],
//     "REQUEST_URI (PREG)" => preg_split('#/+#', $_SERVER['REQUEST_URI'], PREG_SPLIT_NO_EMPTY),
//     "QUERY_STRING" => $_SERVER['QUERY_STRING'],
//     "REQUEST_METHOD" => $_SERVER['REQUEST_METHOD'],
//     "REQUEST_METHOD2" => parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY),

// );

// echo ("<pre>");

// print_r($array);

// echo ("<pre>");


Router::get('/api/v1/translate/{source}/{target}', function ($pathParameters, $queryParameters) {

    extract($queryParameters);
    extract($pathParameters);

    $tr->setSource("{$source}"); // Translate from English
    $tr->setTarget("{$target}"); // Translate to Portuguese

    echo $tr->translate("{$text}");
});

Router::get('/api/v1/api-server/{pathParams}', function($pathParameters, $queryParameters){

    extract($pathParameters);

    extract($queryParameters);

    echo "<pre>";

    print_r(getallheaders()); // TODO: add handler for header

    echo "</pre>";

    echo "I'm the API Server";

    echo "<br/>";

    echo "<br/>";

    echo "<b>the endpoint is:</b> " . $_SERVER['REQUEST_URI'];
    echo "<br/>";
    echo "<b>the method is:</b> " . $_SERVER['REQUEST_METHOD'];
    echo "<br/>";
    echo "<b>the path parameters is:</b> " . $pathParameters;
    echo "<br/>";
    echo "<b>the query parameters is:</b> " . $queryParameters;
});

Router::post('/api/v1/teste', function($pathParameters, $queryParameters){

    extract($pathParameters);

    extract($queryParameters);

    // $RequestBodyParamsHandler = RequestBodyParamsHandlerFactory::createHandler();

    echo "<pre>";

    print_r($RequestBodyParamsHandler->getRequestBody());

    echo "</pre>";

});


// Router::get('/api/v1/porcentage/porcentage', [Controllers\Percentage::class, 'percentage']);

// Router::get('/api/v1/porcentage/simple-interest', [Controllers\Percentage::class, 'simpleInterest']);

// Router::get('/api/v1/porcentage/compound-interest', [Controllers\Percentage::class, 'compoundInterest']);

// Router::get('/api/v1/porcentage/percentage-increase', [Controllers\Percentage::class, 'percentageIncrease']);

// Router::get('/api/v1/porcentage/percentage-decrease', [Controllers\Percentage::class, 'percentageDecrease']);

// Router::get('/api/v1/porcentage/successive-equal-percentage-increases', [Controllers\Percentage::class, 'successiveEqualPercentageIncreases']);

// Router::get('/api/v1/porcentage/successive-equal-percentage-decrease', [Controllers\Percentage::class, 'successiveEqualPercentageDecrease']);



Router::get('/api/v1/verify/{teste}', [Controllers\TestAPI::class, 'verifyGET']);

Router::post('/api/v1/verify/{teste}', [Controllers\TestAPI::class, 'verifyPOST']);

Router::put('/api/v1/verify/{teste}', [Controllers\TestAPI::class, 'verifyPUT']);

Router::delete('/api/v1/verify/{teste}', [Controllers\TestAPI::class, 'verifyDELETE']);

Router::patch('/api/v1/verify/{teste}', [Controllers\TestAPI::class, 'verifyPATCH']);

Router::options('/api/v1/verify/{teste}', [Controllers\TestAPI::class, 'verifyOPTIONS']);

Router::get('/api/login', [Controllers\User::class, 'login']);

Router::get('/api/te', [Controllers\User::class, 'teste']);
// Router::get('/api/te2', [Controllers\User::class, 'teste2']);


// Router::get('/v1/helloworld', [Controllers\HelloWorld::class, 'index']);

// Router::get('/v1/pathParams/{id}/teste', [Controllers\HelloWorld::class, 'pathParams']);

// Router::get('/v1/func/{teste}', function ($pathParameters, $queryParameters) {

//     extract($pathParameters);
//     extract($queryParameters);

//     echo("Eu sou Foda! {$teste} {$nome}");

// });

// Router::get('/v1/teste', function () {

//     echo("teste");

// });
