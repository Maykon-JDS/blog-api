<?php

namespace Controllers;

use DTO\UserDTO;
use stdClass;
use Libs\Adapter\Request\Request;
use Libs\Adapter\Response\Response;
use Services\UserService;

class User extends Controller
{

    private UserService $userService;

    public function __construct()
    {

        $this->userService = new UserService();
    }

    public function login($pathParameters, $queryParameters)
    {

        try {

            extract($pathParameters);
            extract($queryParameters);

            $request = new Request();
            $response = new Response();

            $contentJson = $request->getContent();
            $content = json_decode($contentJson, true);

            $email = $content['email'] ?? null;
            $password = $content['password'] ?? null;

            $userDTO = UserDTO::createFromArray([
                "email" => $email,
                "password" => $password,
            ]);

            $token = $this->userService->login($userDTO);

            $response->setCookie("token", $token);
            $response->setContent(json_encode(["message" => 'Login successful']));
            $response->setStatusCode(200);
        } catch (\Exception $e) {

            $response->setContent(json_encode(["message" => $e->getMessage(), "error" => ["code" => $e->getCode(), "type" => "TODO", "description" => "TODO"]]));
            $response->setStatusCode(401);
        }

        $response->sendJson();
    }


    public function register($pathParameters, $queryParameters)
    {
        try {

            extract($pathParameters);
            extract($queryParameters);

            $request = new Request();
            $response = new Response();

            $contentJson = $request->getContent();
            $content = json_decode($contentJson, true);

            $username = $content['username'] ?? null;
            $email = $content['email'] ?? null;
            $password = $content['password'] ?? null;

            $userDTO = UserDTO::createFromArray([
                "username" => $username,
                "email" => $email,
                "password" => $password,
            ]);

            $this->userService->register($userDTO);

            $response->setContent(json_encode(["message" => 'User created successfully']));
            $response->setStatusCode(201);
        } catch (\Exception $e) {

            $response->setContent(json_encode(["message" => $e->getMessage(), "error" => ["code" => $e->getCode(), "type" => "TODO", "description" => "TODO"]]));
            $response->setStatusCode(400);
        }

        $response->sendJson();
    }
}
