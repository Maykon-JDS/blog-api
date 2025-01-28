<?php

namespace Models;

use DTOs\User as UserDTO;
use Models\Model;

class User extends Model {

    private $database = [];

    public function __construct() {
        $jsonContent = file_get_contents('./Models/database.json');
        $this->database = json_decode($jsonContent, true);
    }

    private function save() {
        file_put_contents('./Models/database.json', json_encode($this->database, JSON_PRETTY_PRINT));
    }

    public function getUser():UserDTO {

        return new UserDTO($this->database[0]);

    }

    public function getUsers():array {
        return array_map(function($record) {
            return new UserDTO($record);
        }, $this->database);
    }

    public function updateUser(Array $data) {
        $this->database[0] = $data;
        $this->save();
    }


}