<?php

namespace Controllers;

use stdClass;
use Libs\Adapter\Request\Request;

class TestAPI extends Controller {

    /**
     * Verify if the request with GET method is working
     *
     * @param array $pathParameters
     * @param array $queryParameters
     * @return void
     */
    public function verifyGET($pathParameters, $queryParameters){

        $this->verify($pathParameters, $queryParameters);

    }

    /**
     * Verify if the request with POST method is working
     *
     * @param array $pathParameters
     * @param array $queryParameters
     * @return void
     */
    public function verifyPOST ($pathParameters, $queryParameters){

        $this->verify($pathParameters, $queryParameters);

    }


    /**
     * Verify if the request with PUT method is working
     *
     * @param array $pathParameters
     * @param array $queryParameters
     * @return void
     */
    public function verifyPUT ($pathParameters, $queryParameters){

        $this->verify($pathParameters, $queryParameters);

    }

    /**
     * Verify if the request with DELETE method is working
     *
     * @param array $pathParameters
     * @param array $queryParameters
     * @return void
     */
    public function verifyDELETE ($pathParameters, $queryParameters){

        $this->verify($pathParameters, $queryParameters);

    }

    /**
     * Verify if the request with PATCH method is working
     *
     * @param array $pathParameters
     * @param array $queryParameters
     * @return void
     */
    public function verifyPATCH ($pathParameters, $queryParameters){

        $this->verify($pathParameters, $queryParameters);

    }

    /**
     * Verify if the request with OPTIONS method is working
     *
     * @param array $pathParameters
     * @param array $queryParameters
     * @return void
     */
    public function verifyOPTIONS ($pathParameters, $queryParameters){

        $this->verify($pathParameters, $queryParameters);

    }

    protected function verify($pathParameters, $queryParameters){

        extract($pathParameters);
        extract($queryParameters);

        $std = new stdClass();

        $std->method = $_SERVER['REQUEST_METHOD'];
        $std->uri = $_SERVER['REQUEST_URI'];
        $std->host = $_SERVER['HTTP_HOST'];
        $std->pathParams = $pathParameters;
        $std->queryParameters = $queryParameters;

        $request = new Request();

        TestAPI::returnJson($request->getAcceptableContentTypes());

    }

}