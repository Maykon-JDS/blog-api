<?php

namespace Services\Interface;

interface Auth {

    static public function attempt($user, $password);

    static public function check($token);

}