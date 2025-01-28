<?php

namespace Services\Interface;

interface Authentication {

    static public function attempt($user, $password);

    static public function check($token);

}