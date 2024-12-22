<?php

namespace Core;

use \Enum\RequestMetod;
use \Enum\RequestMetodInterface;
// use Core\ExceptionHandler;

// TODO: Implementar um Facede

class Router {

    static public function get($uri, callable | array $params)
    {
        try {

            self::handleRoute($uri, $params, RequestMetod::GET);

        } catch (\Throwable $th) {

            echo $th->getMessage();
        }
    }

    static public function post($uri, $params)
    {

        try {

            self::handleRoute($uri, $params, RequestMetod::POST);

        } catch (\Throwable $th) {

            echo $th->getMessage();
        }
    }
    static public function put($uri, $params)
    {

        try {

            self::handleRoute($uri, $params, RequestMetod::PUT);

        } catch (\Throwable $th) {

            echo $th->getMessage();
        }
    }
    static public function patch($uri, $params)
    {

        try {

            self::handleRoute($uri, $params, RequestMetod::PATCH);

        } catch (\Throwable $th) {

            echo $th->getMessage();
        }
    }
    static public function delete($uri, $params)
    {

        try {

            self::handleRoute($uri, $params, RequestMetod::DELETE);

        } catch (\Throwable $th) {

            echo $th->getMessage();
        }
    }
    static public function options($uri, $params)
    {

        try {

            self::handleRoute($uri, $params, RequestMetod::OPTIONS);

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

    static protected function executeClassMethod($params)
    {

        if (class_exists($params[0])) {

            $class = new $params[0]();

            $metho = $params[1];

            $class->$metho();

            return true;
        }

        return false;
    }

    static protected function executeCallable($callback)
    {

        if (is_callable($callback)) {

            $callback();

            return true;
        }

        return false;
    }

    static protected function checkRouteMatch($uri)
    {

        $uriExploded = explode("/", $uri);

        $uriExplodeFiltred = array_filter($uriExploded);

        $currentUriExploded = explode("/", $_SERVER['REQUEST_URI']);

        $currentUriExplodedFiltred = array_filter($currentUriExploded);

        if ($uriExplodeFiltred == array_filter($currentUriExplodedFiltred)) {
            return true;
        }

        return false;
    }

    static protected function checkRequestMethod(RequestMetodInterface $requestMethod)
    {

        if ($_SERVER['REQUEST_METHOD'] == $requestMethod->value) {
            return true;
        }

        return false;

    }

    static protected function handleRoute($uri, $params, RequestMetodInterface $requestMethod)
    {

        try {

            if (!self::checkRequestMethod($requestMethod)) {
                return;
            }

            if (!self::checkRouteMatch($uri)) {
                return;
            }

            if (self::executeCallable($params)) {
                return;
            }

            if (self::executeClassMethod($params)) {
                return;
            }

        } catch (\Throwable $th) {

            echo $th->getMessage();
        }
    }
}
