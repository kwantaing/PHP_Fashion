<?php

class PostController extends DefaultController {
    
    protected $model = null;

    public function __construct() {
        parent::__construct();
    }

    // public function newPostPOST() {
    //     session_start();
    //     echo "YOU JUST SUBMITTED A NEW POST";
    //     echo var_dump($_POST);
    //     echo $_POST['post_img'];
    //     echo "<img src='" . $_POST['post_img'] . "'/>";
    // }

    public function newPostPOST() {
        session_start();
        $vm = PostVM::newPostInstance();
        if($vm->postType == PostVM::VALID_POST) {
            Page::$title = 'Post Details';
            require(APP_NON_WEB_BASE_DIR . 'views/PostDetail.php');
        }else {
            Page::$title = 'New Post';
            require(APP_NON_WEB_BASE_DIR . 'views/newPost.php');

        }
    }

    public function newPostGET(){
        session_start();
        before_every_protected_page();
        //check session logged in
        //if session in

        require(APP_NON_WEB_BASE_DIR . 'views/newPost.php');
    }

    // public function featured(){
    //     session_start();
    //     //check session logged in
    //     before_every_protected_page();
    //     //if session in
    //     require(APP_NON_WEB_BASE_DIR . 'views/userHome.php');
    // }
        
}
