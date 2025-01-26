<?php

namespace Enum;

enum RequestMetod : string implements RequestMetodInterface  {

    case GET = "GET";
    case POST = "POST";
    case PUT = "PUT";
    case PATCH = "PATCH";
    case DELETE = "DELETE";
    case OPTIONS = "OPTIONS";

}