<?php


class UsersVM {
    public $user;
    private $userDAM;

    public function __construct() {
        $this->$userDAM = new UserDAM();
        $this ->$user = '';
    }
}