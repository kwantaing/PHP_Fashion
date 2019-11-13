<?php

class RegisterVM {
    // public $enteredUserEmail;
    // public $enteredFirstName;
    // public $enteredLastName;
    // public $enteredPassword;
    public $regErr;

    public function __construct() {
        $this->userDAM = new UserDAM();
        $this->regErr = [];
    }

    public static function regNewUserInstance() {
        $vm = new self();
        $user_id = '';
        $valid = true;
        $regErr = [];
        $firstName = filter_input(INPUT_POST,'firstName');
        $lastName = filter_input(INPUT_POST,'lastName');
        $email = filter_input(INPUT_POST,'email');
        if($firstName === null or $lastName === null or $email === null){
            $regErr[] = 'Please enter in all fields';
            $valid = false;
        }
        if(filter_input(INPUT_POST,'password')!= filter_input(INPUT_POST,'pwConfirm')) {
            $valid = false;
            $regErr[] = 'passwords do not match';
        } else {
            $hashed_pw = password_hash(filter_input(INPUT_POST,'password'),PASSWORD_BCRYPT);
            $newUserArray = array(
                'user_id' => $user_id,
                'firstName' => $firstName,
                'lastName' => $lastName,
                'email' => $email,
                'password' => $hashed_pw
            );
            // echo var_dump($newUserArray);
            if($valid === true) {
                $vm->user = new User($newUserArray);
                // echo var_dump($vm->user);
                $regErr[] = $vm->userDAM->newUserCreate($vm->user);
        }
            foreach($regErr as $err){
                echo $err;
                if($err === "user already exists with that email"){
                    $valid = false;
                }
            }
        }
        if($valid === false) {
            return false;
        }else{
            session_start();
            after_successful_login();
            $_SESSION ['userName'] = $user->firstName . ' ' . $user->lastName;
            $_SESSION ['email'] = $vm->enteredUserEmail;
            return $vm;
        }
    }
}