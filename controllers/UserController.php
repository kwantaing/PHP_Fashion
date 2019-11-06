<?php

class UserController extends DefaultController {

    protected $model = null;

    public function __construct() {
        parent::__construct();
    }
    public function logRegGET() {
        // Page::$title = 'Fashion Advices - Login & Registration';
        require(APP_NON_WEB_BASE_DIR .'views/loginReg.php');
    }
    public function loginPOST() {
        // Page::$title = 'Fashion Advices - Login & Registration';
        if(!isset($_POST['email']) && !isset($_POST['password'])){
            echo "Please enter in all input fields.";
            require(APP_NON_WEB_BASE_DIR .'views/loginReg.php');
        }else{
            //validations
            //save to session?
            require(APP_NON_WEB_BASE_DIR . 'views/userHome.php');
        }

    }
    public function registerPOST() {
        Page::$title = 'Fashion Advices - Login & Registration';
        $valid = true;
        if(!isset($_POST['email']) && !isset($_POST['password'])){
            echo "email field empty";
            $valid = false;
        }else{
            $sanitized_email = emailPOST($_POST['email']);
        }
        if($_POST['password']!=$_POST['pwConfirm']){
            echo "passwords do not match";
            $valid = false;
        }else{
            echo $_POST['password'];
        }
        $hashed_pw = password_hash($_POST['password'],PASSWORD_BCRYPT);
        echo "\n $hashed_pw";
        if($valid === true) {
            require(APP_NON_WEB_BASE_DIR .'views/userHome.php');
        }else {
            require(APP_NON_WEB_BASE_DIR . 'views/loginReg.php');
        }
    }

        
}
