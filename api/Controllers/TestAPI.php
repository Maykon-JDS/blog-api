<?php

namespace Controllers;

use stdClass;

class TestAPI extends Controller {

    public function verifyGET($pathParams, $queryParameters){

        $this->verify($pathParams, $queryParameters);

    }

    public function verifyPOST ($pathParams, $queryParameters){

        $this->verify($pathParams, $queryParameters);

    }

    public function verifyPUT ($pathParams, $queryParameters){

        $this->verify($pathParams, $queryParameters);

    }

    public function verifyDELETE ($pathParams, $queryParameters){

        $this->verify($pathParams, $queryParameters);

    }

    public function verifyPATCH ($pathParams, $queryParameters){

        $this->verify($pathParams, $queryParameters);

    }


    public function verifyOPTIONS ($pathParams, $queryParameters){

        $this->verify($pathParams, $queryParameters);

    }

    protected function verify($pathParams, $queryParameters){

        extract($pathParams);
        extract($queryParameters);

        $std = new stdClass();

        $std->method = $_SERVER['REQUEST_METHOD'];
        $std->uri = $_SERVER['REQUEST_URI'];
        $std->host = $_SERVER['HTTP_HOST'];
        $std->pathParams = $pathParams;
        $std->queryParameters = $queryParameters;

        TestAPI::returnJson($std);

    }

}