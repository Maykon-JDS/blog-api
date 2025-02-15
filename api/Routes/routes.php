<?php

use Core\Router;
use Middlewares\Authentication as AuthenticationMiddleware;
use Middlewares\JsonRequest;
use Middlewares\AcceptRequest;
use Libs\Adapter\Request\Request;
use Libs\Adapter\Response\Response;
use Entities\User;


// use Stichoza\GoogleTranslate\GoogleTranslate;
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

// $pdo = new PDO($_ENV["DB_DRIVER"] . ':host='. $_ENV["DB_HOST"] .';dbname=' . $_ENV["DB_DATABASE"], $_ENV["DB_USERNAME"], $_ENV["DB_PASSWORD"]);

// $result = $pdo->query("SELECT * FROM teste");

// print_r($result->fetchAll());

// phpinfo();

try {

    // $user = new User();

    // $user->setUsername("Maykon");

    // $user->setEmail("maykondias2002@gmail.com");

    // $user->setPassword("123456");

    // $entityManager->persist($user);

    // $entityManager->flush();

    $user = $entityManager->getRepository(User::class)->findOneBy(['email' => 'maykondias2001@gmail.com']);

    if($user->getPassword() !== "12345"){

        echo "Senha Incorreta";

    }

    echo $user->getUserName();

} catch (\Throwable $th) {

    echo $th->getMessage();

}

exit;

$request = new Request();

$response = new Response();

$jsonRequest = new JsonRequest();

$jsonRequest->chain(new AcceptRequest());

$jsonRequest->handle($request);

Router::get('/api/login', [Controllers\User::class, 'login'])->name('login');

$authenticationMiddleware = new AuthenticationMiddleware();

$authenticationMiddleware->handle($request);

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


Router::get('/api/v1/verify/{teste}', [Controllers\TestAPI::class, 'verifyGET'])->name('verify');

Router::post('/api/v1/verify/{teste}', [Controllers\TestAPI::class, 'verifyPOST']);

Router::put('/api/v1/verify/{teste}', [Controllers\TestAPI::class, 'verifyPUT']);

Router::delete('/api/v1/verify/{teste}', [Controllers\TestAPI::class, 'verifyDELETE']);

Router::patch('/api/v1/verify/{teste}', [Controllers\TestAPI::class, 'verifyPATCH']);

Router::options('/api/v1/verify/{teste}', [Controllers\TestAPI::class, 'verifyOPTIONS']);

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
