<?php


namespace Core;

require_once "vendor/autoload.php";

// use Core\ExceptionHandler;

// TODO: Implementar um Facede

class Router
{

    static public function get($uri, callable | array $params) : void
    {
        try {

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

        // Callback = Função | Executar função
        // Callback = Array (Class, Method) | Executar method da class
        // Passar o namespace da class para a função "use" para importar de forma automatica a class com a utilização do autoloader
        // Instanciar a class de forma dinamica
        // Executar o method de forma dinamica

    }

    static public function post($uri, $callback)
    {

        return "Hello World";
    }
    static public function put($uri, $callback)
    {

        return "Hello World";
    }
    static public function patch($uri, $callback)
    {

        return "Hello World";
    }
    static public function delete($uri, $callback)
    {

        return "Hello World";
    }
    static public function options($uri, $callback)
    {

        return "Hello World";
    }

    static public function handleResponseCode($code, callable | array $params)
    {

        if (http_response_code() == $code) {

            echo ("Teste");

        }
    }

    static protected function executeClassMethod($params){

        if (class_exists($params[0])) {

            $class = new $params[0]();

            $metho = $params[1];

            $class->$metho();

            return true;
        }

        return false;

    }

    static protected function executeCallable($callback){

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
}
