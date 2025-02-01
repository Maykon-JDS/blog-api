<?php

namespace Core;

use \Enum\RequestMetod;
use \Enum\RequestMetodInterface;

class Router extends HttpRequestHandler
{
    protected static $routes = [];
    protected static ?int $currentRouteKey = null;
    protected static ?RequestMetodInterface $currentRequestMetod = null;

    protected static ?Router $instance = null;

    protected function __construct()
    {
    }

    static public function get($route, callable | array $params)
    {
        self::registerRoute($route, RequestMetod::GET);

        self::handleRoute($route, $params, RequestMetod::GET);

        return self::getInstance();
    }

    static public function post($route, $params)
    {
        self::registerRoute($route, RequestMetod::POST);

        self::handleRoute($route, $params, RequestMetod::POST);

        return self::getInstance();
    }

    static public function put($route, $params)
    {
        self::registerRoute($route, RequestMetod::PUT);

        self::handleRoute($route, $params, RequestMetod::PUT);

        return self::getInstance();
    }

    static public function patch($route, $params)
    {
        self::registerRoute($route, RequestMetod::PATCH);

        self::handleRoute($route, $params, RequestMetod::PATCH);

        return self::getInstance();
    }

    static public function delete($route, $params)
    {
        self::registerRoute($route, RequestMetod::DELETE);

        self::handleRoute($route, $params, RequestMetod::DELETE);

        return self::getInstance();
    }
    static public function options($route, $params)
    {
        self::registerRoute($route, RequestMetod::OPTIONS);

        self::handleRoute($route, $params, RequestMetod::OPTIONS);

        return self::getInstance();
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

            // $bodyParameters = self::extractBodyParameters();

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

    static protected function registerRoute($route, RequestMetodInterface $requestMethod){

        if(self::isRouteRegistered($route, $requestMethod)){
            throw new \Exception('Route already registered');
        }

        self::$routes[$requestMethod->value][] = ['route' => $route];

        self::$currentRouteKey = array_key_last(self::$routes[$requestMethod->value]);

        self::$currentRequestMetod = $requestMethod;

    }

    static protected function isRouteRegistered($route, RequestMetodInterface $requestMethod){

        if(!isset(self::$routes[$requestMethod->value])){
            return false;
        }

        foreach(self::$routes[$requestMethod->value] as $registeredRoute){
            if($registeredRoute['route'] == $route){
                return true;
            }
        }

        return false;

    }

    static protected function getInstance(){

        if(!self::$instance){
            self::$instance = new Router();
        }

        return self::$instance;

    }

    static public function getRegisteredRoutes(){
        return self::$routes;
    }

    public function name(string $name){

        self::$routes[self::$currentRequestMetod->value][self::$currentRouteKey]['name'] = $name;

    }

}
