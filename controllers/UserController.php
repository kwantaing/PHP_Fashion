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
        if(!isset($_SESSION)){
            session_start();
        }
        Page::$title = 'Login & Registration';
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
        if(!isset($_SESSION)){
            session_start();
        }
        $delay = false;
        after_successful_logout();
        if(!isset($_POST['email']) && !isset($_POST['password'])){
            $logErr[] = "Please enter in all input fields.";
            $delay = true;
            Page::$title = 'Login & Registration';
            require(APP_NON_WEB_BASE_DIR .'views/loginReg.php');
        }else{
            $vm = LoginVM::getInstance();
            if ($vm->userType === LoginVM::VALID_LOGIN) {
                after_successful_login();
                $vm = PostVM::getLastNine();
                $top_posts = $vm->ObjectArray;
                Page::$title = 'Featured Posts';
                header("Location: ?ctlr=home&action=featured");
                // require(APP_NON_WEB_BASE_DIR . 'views/userHome.php');
            } else {
                $delay = true;
                $logErr[] = "Email or password incorrect.";
                Page::$title = 'Login & Registration';
                require(APP_NON_WEB_BASE_DIR . 'views/loginReg.php');
            }
        }

    }
    
    public function logout() {
        after_successful_logout();
        Page::$title = 'Clothing in Style - Four to Seven Tee';
        require(APP_NON_WEB_BASE_DIR . 'views/home.php');
    }
    public function registerPOST() {
        after_successful_logout();
        session_start();
        $valid = true;
        $regErr = [];
        // $regex = "^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$";
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
        if($valid == true && strlen($_POST['password'])<7) {
            $regErr[]= "Password must contain at least 6 characters.";
            $valid = false;
        }
        // if(preg_match($PWregex,$_POST['password')===0 or preg_match($PWregex,$_POST['password')===false){
        //     $regErr[] = "Password must contain 6 to 14 characters: at least one Uppercase letter, one lowercase letter,and one number.";
        //     $valid = false;
        // }
        if($valid == true){
            $vm = RegisterVM::regNewUserInstance();
            Page::$title = 'Login & Registration';
            if($vm->userType == RegisterVM::VALID_REG){
                after_successful_login();
                $vm = PostVM::getLastNine();
                $top_posts = $vm->ObjectArray;
                Page::$title = 'Featured Posts';
                header("Location: ?ctlr=home&action=featured");
                // require(APP_NON_WEB_BASE_DIR . 'views/userHome.php');
            }else {
                $delay = true;
                $regErr[]= "A user with that email already exists.";
                Page::$title = 'Login & Registration';
                require(APP_NON_WEB_BASE_DIR . 'views/loginReg.php');
            }

        }else{
            $delay = true;
            Page::$title = 'Login & Registration';
            require(APP_NON_WEB_BASE_DIR . 'views/loginReg.php');

        }


    }

        
}
