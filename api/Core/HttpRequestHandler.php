<?php

namespace Core;

use \Enum\RequestMetodInterface;
use \Enum\RequestMetod;
use Core\FactoryMethods\RequestBodyParamsHandlerFactory\RequestBodyParamsHandlerFactory;

abstract class HttpRequestHandler{

    protected const PARAMETER_PATH_KEY_PATTERN = '/\{([a-zA-Z0-9_]+)\}/';

    static protected function generateRoutePattern($route)
    {

        $pattern = preg_replace(self::PARAMETER_PATH_KEY_PATTERN, '([^/]+)', $route);

        $pattern = "#^" . $pattern . "$#";

        return $pattern;

    }

    static protected function checkRouteMatch($route)
    {

        $currentUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        $pattern = self::generateRoutePattern($route);

        preg_match($pattern, $currentUri, $matches);

        return !empty($matches) ? true : false;

    }

    static protected function extractQueryParameters()
    {

        parse_str($_SERVER['QUERY_STRING'], $query);

        return !empty($query) ? $query : [];

    }

    static protected function extractBodyParameters()
    {

        if(!self::allowsBodyParams()){
            return [];
        }

        if(!self::hasContentTypeHeader()){
            return [];
        }

        $RequestBodyParamsHandler = RequestBodyParamsHandlerFactory::createHandler();

        $bodyParameters = $RequestBodyParamsHandler->getRequestBody();

        return $bodyParameters;

    }

    static protected function extractPathParameters($route)
    {

        $currentUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        preg_match_all(self::PARAMETER_PATH_KEY_PATTERN, $route, $parameterKeys);

        array_shift($parameterKeys);

        $parameterKeys = array_merge([], $parameterKeys[0]);

        $pattern = self::generateRoutePattern($route);

        preg_match($pattern, $currentUri, $matches);

        array_shift($matches);

        return !empty($matches) ? array_combine($parameterKeys, $matches) : [];

    }

    static protected function checkRequestMethod(RequestMetodInterface $requestMethod) : bool
    {

        return $_SERVER['REQUEST_METHOD'] == $requestMethod->value;

    }

    static protected function getHeaders() : array | false
    {

        $headers = getallheaders();

        return $headers;

    }

    static protected function hasContentTypeHeader() : bool
    {

        $headers = self::getHeaders();

        if (isset($headers['Content-Type'])) {

            return true;
        }

        return false;

    }

    static protected function allowsBodyParams() : bool
    {

        switch ($_SERVER['REQUEST_METHOD']) {
            case RequestMetod::POST->value:
            case RequestMetod::PUT->value:
            case RequestMetod::PATCH->value:
                return true;
                break;
            default:
                return false;
                break;
        }

    }

}