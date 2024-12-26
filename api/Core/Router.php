<?php

namespace Core;

use \Enum\RequestMetod;
use \Enum\RequestMetodInterface;
// use Core\ExceptionHandler;

// TODO: Implementar um Facede

class Router
{

    protected const PARAMETER_PATH_KEY_PATTERN = '/\{([a-zA-Z0-9_]+)\}/';

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

    static protected function executeClassMethod($params, $pathParams = [], $queryParameters = [])
    {

        if (class_exists($params[0])) {

            $class = new $params[0]();

            $metho = $params[1];

            $class->$metho($pathParams, $queryParameters);

            return true;
        }

        return false;
    }

    static protected function executeCallable($callback, $pathParams = [], $queryParameters = [])
    {

        if (is_callable($callback)) {

            $callback($pathParams, $queryParameters);

            return true;
        }

        return false;
    }

    static protected function checkRouteMatch($route)
    {

        $currentUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        $pattern = self::generateRoutePattern($route);

        preg_match($pattern, $currentUri, $matches);

        return !empty($matches) ? true : false;

    }

    static protected function extractPathParameters($route)
    {

        $currentUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        preg_match(self::PARAMETER_PATH_KEY_PATTERN, $route, $parameterKeys);

        array_shift($parameterKeys);

        $pattern = self::generateRoutePattern($route);

        preg_match($pattern, $currentUri, $matches);

        array_shift($matches);

        return !empty($matches) ? array_combine($parameterKeys, $matches) : [];

    }

    static protected function extractQueryParameters()
    {

        parse_str($_SERVER['QUERY_STRING'], $query);

        return !empty($query) ? $query : [];

    }

    static protected function generateRoutePattern($route)
    {

        $pattern = preg_replace(self::PARAMETER_PATH_KEY_PATTERN, '([^/]+)', $route);

        $pattern = "#^" . $pattern . "$#";

        return $pattern;

    }

    static protected function checkRequestMethod(RequestMetodInterface $requestMethod)
    {

        return $_SERVER['REQUEST_METHOD'] == $requestMethod->value;
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

            $pathParameters = self::extractPathParameters($route);

            $queryParameters = self::extractQueryParameters();

            if (self::executeCallable($params, $pathParameters, $queryParameters)) {
                return;
            }

            if (self::executeClassMethod($params, $pathParameters, $queryParameters)) {
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
