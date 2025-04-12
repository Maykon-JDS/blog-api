<?php

namespace Services\Interface;

interface Auth extends Service {

    public function attempt($user, $password);

    public function check($token);

}