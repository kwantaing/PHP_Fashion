<?php 

class User {

    private $user_id;
    private $email;
    private $firstName;
    private $lastName;
    private $password;

    function __construct($data = array()) {
        if (!is_array($data)) {
            trigger_error('Non-array input to ' . get_class() . 'constructor');
        } elseif ($data !== null) {

            // If the input array has at least one value, set the corresponding
            // instance variable.
            foreach ($data as $name => $value) {
                $this->$name = $value;
            }
        }
    }

    function __get($name) {
        return $this->$name;
    }

    function __set($name, $value) {
        $this->$name = $value;
    }
}