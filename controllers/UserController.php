<?php

class UserController extends DefaultController {
    
    protected $model = null;

    public function __construct() {
        // define('DB_HOST', 'localhost');
        // define('DB_USER', 'fashionuser');
        // define('DB_PASS', 'password'); //set DB_PASS as 'root' if you're using mac
        // define('DB_DATABASE', 'FashionSite'); //make sure to set your database
        // //connect to database host
        // $connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);

        // if($connection->connect_errno)
        // {
        //     echo ("Failed to connect to MySQL: (" . $connection->connect_errno . ") " . $connection->connect_error);
        // }
        parent::__construct();
    }
    public function logRegGET() {
        session_start();
        Page::$title = 'Fashion Advices - Login & Registration';
        require(APP_NON_WEB_BASE_DIR .'views/loginReg.php');
    }
    // public function loginPOST() {
    //     $logErr = [];
    //     // Page::$title = 'Fashion Advices - Login & Registration';
    //     $delay = false;
    //     if(!isset($_POST['email']) && !isset($_POST['password'])){
    //         $logErr[] = "Please enter in all input fields.";
    //         $delay = true;
    //         require(APP_NON_WEB_BASE_DIR .'views/loginReg.php');
    //     }else{
    //         $sanitized_email = emailPOST($_POST['email']);
    //         //query database for account matching email
    //         // $users = $connection->query("SELECT * FROM Users where user_id > 0;");
    //         // foreach($users as $user){
    //         //     echo var_dump($user);
    //         // }
    //         $temp_pwCheckfromDB = "password";
    //         if($_POST['password']=== $temp_pwCheckfromDB){
    //             require(APP_NON_WEB_BASE_DIR . 'views/userHome.php');
    //         }else{
    //             $delay = true;
    //             $logErr[] = "password or email incorrect";
    //             require(APP_NON_WEB_BASE_DIR . 'views/loginReg.php');
    //         }
    //         //validations
    //         //save to session?
    //     }

    // }
    public function loginPOST() {
        session_start();
        $delay = false;
        after_successful_logout();
        if(!isset($_POST['email']) && !isset($_POST['password'])){
            $logErr[] = "Please enter in all input fields.";
            $delay = true;
            require(APP_NON_WEB_BASE_DIR .'views/loginReg.php');
        }else{
            $vm = LoginVM::getInstance();
            if ($vm->userType === LoginVM::VALID_LOGIN) {
                after_successful_login();
                $vm = PostVM::getLastNine();
                $top_posts = $vm->ObjectArray;
                require(APP_NON_WEB_BASE_DIR . 'views/userHome.php');
            } else {
                $delay = true;
                $logErr[] = "password or email incorrect";
                require(APP_NON_WEB_BASE_DIR . 'views/loginReg.php');
            }
            //validations

            //save to session?
        }

    }
    
    public function logout() {
        session_start();
        session_destroy();
        after_successful_logout();
        require(APP_NON_WEB_BASE_DIR . 'views/home.php');
    }
    // public function registerPOST() {
    //     Page::$title = 'Fashion Advices - Login & Registration';
    //     $valid = true;
    //     $regErr = [];
    //     if(!isset($_POST['email']) && !isset($_POST['password'])){
    //         $regErr[] = "email field empty";
    //         $valid = false;
    //     }else{
    //         $sanitized_email = emailPOST($_POST['email']);
    //     }
    //     if($_POST['password']!=$_POST['pwConfirm']){
    //         $regErr[] = "passwords do not match";
    //         $valid = false;
    //     }else{
    //         echo $_POST['password'];
    //     }
    //     if($valid === true) {
    //         $hashed_pw = password_hash($_POST['password'],PASSWORD_BCRYPT);
    //         echo "\n $hashed_pw";
    //         //save user to databse
    //         //set user as session user
    //         //redirect to user homepage
    //         require(APP_NON_WEB_BASE_DIR .'views/userHome.php');
    //     }else {
    //         require(APP_NON_WEB_BASE_DIR . 'views/loginReg.php');
    //     }
    // }

    public function registerPOST() {
        session_start();
        after_successful_logout();
        $valid = true;
        $regErr = [];
        if(!isset($_POST['email']) || !isset($_POST['password']) || !isset($_POST['firstName']) || !isset($_POST['lastName'])){
            $regErr[] = "Please fill in all fields";
            $valid = false;
        }
        if($_POST['password']!= $_POST['pwConfirm']){
            $regErr[] = "Passwords do not match";
            $valid = false;
        }
        if(strpos($_POST['email'],';')!==false || strpos($_POST['email'],'\'')!==false
        || strpos($_POST['firstName'],';')!==false || strpos($_POST['firstName'],'\'')!==false
        ||strpos($_POST['lastName'],';')!==false || strpos($_POST['lastName'],'\'')!==false)
        {
            //potential SQL injection check
            $regErr[] = "Potential SQL injection attack";
            $valid = false;
        }
        if($valid == true){
            $vm = RegisterVM::regNewUserInstance();
            Page::$title = 'Fashion Advices - Login & Registration';
            if($vm->userType == RegisterVM::VALID_REG){
                $vm = PostVM::getLastNine();
                $top_posts = $vm->ObjectArray;
                require(APP_NON_WEB_BASE_DIR .'views/userHome.php');
            }else {
                $delay = true;
                require(APP_NON_WEB_BASE_DIR . 'views/loginReg.php');
            }

        }else{
            $delay = true;
            require(APP_NON_WEB_BASE_DIR . 'views/loginReg.php');

        }


    }

        
}
