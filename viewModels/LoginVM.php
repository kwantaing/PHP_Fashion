<?php

/**
 * View model for login functions.
 *
 * @author jam
 * @version 181117
 */
class LoginVM {

    public $enteredUserEmail;
    public $enteredPassword;
    public $userType;
    public $errorMsg;
    public $statusMsg;
    
    // User type constants used for switching in the controller.
    const VALID_LOGIN = 'valid_login';
    const INVALID_LOGIN = 'invalid_login';
    
    public function __construct() {
        $this->userDAM = new UserDAM();
        $this->errorMsg = '';
        $this->statusMsg = array();
        $this->enteredUserEmail = '';
        $this->enteredPassword = '';
    }

    public static function getInstance() {
        $vm = new self();
        $vm->enteredUserEmail = hPOST('email');
        $vm->enteredPassword = hPOST('password');
        $user = $vm->userDAM->readUser($vm->enteredUserEmail);
        if ($vm->authenticateUser($user)) {
            $vm->userType = self::VALID_LOGIN;
            session_start();
            after_successful_login();
            $_SESSION ['userName'] = $user->firstName . ' ' . $user->lastName;
            $_SESSION ['email'] = $vm->enteredUserEmail;
        } else {
             $vm->userType = self::INVALID_LOGIN;
        }
        return $vm;
    }
    
    private function authenticateUser($user) {
        $userFound = true;
        if ($user === null) {
            $userFound = false;
        }
        return 
            // $userFound &&
            password_verify($this->enteredPassword, $user->password);
    }

}
