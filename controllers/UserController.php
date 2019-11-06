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
        $logErr = [];
        // Page::$title = 'Fashion Advices - Login & Registration';
        $delay = false;
        if(!isset($_POST['email']) && !isset($_POST['password'])){
            $logErr[] = "Please enter in all input fields.";
            $delay = true;
            require(APP_NON_WEB_BASE_DIR .'views/loginReg.php');
        }else{
            $temp_pwCheckfromDB = "password";
            if($_POST['password']=== $temp_pwCheckfromDB){
                require(APP_NON_WEB_BASE_DIR . 'views/userHome.php');
            }else{
                $delay = true;
                $logErr[] = "password or email incorrect";
                require(APP_NON_WEB_BASE_DIR . 'views/loginReg.php');
            }
            //validations
            //save to session?
        }

    }
    public function registerPOST() {
        Page::$title = 'Fashion Advices - Login & Registration';
        $valid = true;
        $regErr = [];
        if(!isset($_POST['email']) && !isset($_POST['password'])){
            $regErr[] = "email field empty";
            $valid = false;
        }else{
            $sanitized_email = emailPOST($_POST['email']);
        }
        if($_POST['password']!=$_POST['pwConfirm']){
            $regErr[] = "passwords do not match";
            $valid = false;
        }else{
            echo $_POST['password'];
        }
        if($valid === true) {
            $hashed_pw = password_hash($_POST['password'],PASSWORD_BCRYPT);
            // echo "\n $hashed_pw";
            //save user to databse
            //set user as session user
            //redirect to user homepage
            require(APP_NON_WEB_BASE_DIR .'views/userHome.php');
        }else {
            require(APP_NON_WEB_BASE_DIR . 'views/loginReg.php');
        }
    }

        
}
