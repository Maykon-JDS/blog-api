<?php

namespace Controllers;

use stdClass;
use Libs\Adapter\Request\Request;
use Libs\Adapter\Response\Response;
use Services\Authentication;
use Models\User as UserModel;


class User extends Controller {

    public function login($pathParameters, $queryParameters){

        extract($pathParameters);
        extract($queryParameters);

        $std = new stdClass();

        $request = new Request();
        $response = new Response();

        $response->setHeader('Content-Type', 'application/json');

        // $token = Authentication::attempt("admin", "admin");

        if ($token) {
            $response->setContent(json_encode(['Login successful', 'token' => $token]));
            $response->setStatusCode(200);
        } else {
            $response->setContent('Login failed');
            $response->setStatusCode(401);
        }

        $response->send();

    }

    public function teste($pathParameters, $queryParameters){

        extract($pathParameters);
        extract($queryParameters);

        $std = new stdClass();

        $response = new Response();

        $response->setHeader('Content-Type', 'application/json');

        // if (Authentication::check('0637b30b6b3ab6421529d7e6b1296ad9')) {
            $response->setContent(json_encode(['teste']));
            $response->setStatusCode(200);
        // } else {
        //     $response->setContent(json_encode(['Unauthorized']));
        //     $response->setStatusCode(401);
        // }

        $response->send();

        return;

    }

    public function teste2($pathParameters, $queryParameters){

        extract($pathParameters);
        extract($queryParameters);

        $std = new stdClass();

        $response = new Response();

        $response->setHeader('Content-Type', 'application/json');

        if (Authentication::check('0637b30b6b3ab6421529d7e6b1296ad9')) {
            $response->setContent(json_encode(['Authorized']));
            $response->setStatusCode(200);
        } else {
            $response->setContent(json_encode(['Unauthorized']));
            $response->setStatusCode(401);
        }

        $response->send();

    }

}