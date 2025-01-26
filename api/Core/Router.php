<?php

namespace Core;

use \Enum\RequestMetod;
use \Enum\RequestMetodInterface;

class Router extends HttpRequestHandler
{

    static public function get($route, callable | array $params)
    {

        self::handleRoute($route, $params, RequestMetod::GET);
    }

    static public function post($route, $params)
    {

        self::handleRoute($route, $params, RequestMetod::POST);
    }

    static public function put($route, $params)
    {

        self::handleRoute($route, $params, RequestMetod::PUT);
    }

    static public function patch($route, $params)
    {

        self::handleRoute($route, $params, RequestMetod::PATCH);
    }
    static public function delete($route, $params)
    {

        self::handleRoute($route, $params, RequestMetod::DELETE);
    }
    static public function options($route, $params)
    {

        self::handleRoute($route, $params, RequestMetod::OPTIONS);
    }

    static protected function executeClassMethod($params, $pathParameters = [], $queryParameters = [], $bodyParameters = [])
    {

        if (class_exists($params[0])) {

            $class = new $params[0]();

            $metho = $params[1];

            $class->$metho($pathParameters, $queryParameters, $bodyParameters);

            return true;
        }

        return false;
    }

    static protected function executeCallable($callback, $pathParameters = [], $queryParameters = [], $bodyParameters = [])
    {

        if (is_callable($callback)) {

            $callback($pathParameters, $queryParameters, $bodyParameters);

            return true;
        }

        return false;
    }

    static protected function handleRoute($route, $params, RequestMetodInterface $requestMethod)
    {

        try {

            if (!self::checkRequestMethod($requestMethod)) {
                return;
            }

            if (!self::checkRouteMatch($route)) {
                return;
            }

            $bodyParameters = self::extractBodyParameters();

            $pathParameters = self::extractPathParameters($route);

            $queryParameters = self::extractQueryParameters();

            if (self::executeCallable($params, $pathParameters, $queryParameters, $bodyParameters)) {
                return;
            }

            if (self::executeClassMethod($params, $pathParameters, $queryParameters, $bodyParameters)) {
                return;
            }
        } catch (\Throwable $th) {

            echo $th->getMessage();
        }
    }

    // static public function handleResponseCode($code, callable | array $params)
    // {

    //     if (http_response_code() == $code) {

    //         echo ("Teste");
    //     }
    // }
}
