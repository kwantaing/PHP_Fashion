<?php 

class User {

    private $user_id;
    private $email;
    private $password;

    function __get($email) {
        return $this->$email;
    }

    function __set($email, $value) {
        $this->$email = $value;
    }
}